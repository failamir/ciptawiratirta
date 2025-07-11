<?php
namespace Modules\News\Controllers;

use Illuminate\Http\Request;
use Modules\FrontendController;
use Modules\Language\Models\Language;
use Modules\News\Models\News;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\NewsTranslation;
use Modules\News\Models\Tag;

class NewsController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $model_News = News::query()->select("core_news.*");
        $model_News->where("core_news.status", "publish")->orderBy('core_news.id', 'desc');
        if (!empty($search = $request->input("s"))) {
            $model_News->where(function($query) use ($search) {
                $query->where('core_news.title', 'LIKE', '%' . $search . '%');
                $query->orWhere('core_news.content', 'LIKE', '%' . $search . '%');
            });

            if( setting_item('site_enable_multi_lang') && setting_item('site_locale') != app_get_locale() ){
                $model_News->leftJoin('core_news_translations', function ($join) use ($search) {
                    $join->on('core_news.id', '=', 'core_news_translations.origin_id');
                });
                $model_News->orWhere(function($query) use ($search) {
                    $query->where('core_news_translations.title', 'LIKE', '%' . $search . '%');
                    $query->orWhere('core_news_translations.content', 'LIKE', '%' . $search . '%');
                });
            }

            $title_page = __('Search results : ":s"', ["s" => $search]);
        }
        $limit = $request->get('limit', 6);
        $limit = abs($limit) > 50 ? 50 : abs($limit);
        $data = [
            'rows'              => $model_News->with("getAuthor")->with('translations')->with("getCategory")->paginate($limit),
            'model_category'    => NewsCategory::query()->where("status", "publish"),
            'model_tag'         => Tag::query(),
            'model_news'        => News::query()->where("status", "publish"),
            'custom_title_page' => $title_page ?? "",
            'breadcrumbs'       => [
                [
                    'name'  => __('News'),
                    'url'  => route('news.index'),
                    'class' => 'active'
                ],
            ],
            'header_transparent'=>true,
            "seo_meta" => News::getSeoMetaForPageList(),
            "languages"=>Language::getActive(false),
            "locale"=> app()->getLocale()
        ];
        return view('News::frontend.index', $data);
    }

    public function detail(Request $request, $slug)
    {
        $row = News::where('slug', $slug)->where('status','publish')->first();
        if (empty($row)) {
            return redirect('/');
        }
        $near_post = $row->near_post();
        $translation = $row->translateOrOrigin(app()->getLocale());
        $row->type = 'news';

        $review_list = $row->getReviewList();
        $review_list->setPageName('comment-page');
        $data = [
            'row'               => $row,
            'translation'       => $translation,
            'model_category'    => NewsCategory::where("status", "publish"),
            'model_tag'         => Tag::query(),
            'model_news'        => News::where("status", "publish"),
            'custom_title_page' => $title_page ?? "",
            'review_list'  => $review_list,
            'related_posts' => $row->relatedPosts(3),
            'breadcrumbs'       => [
                [
                    'name' => __('News'),
                    'url'  => route('news.index')
                ],
                [
                    'name'  => $translation->title,
                    'class' => 'active'
                ],
            ],
            'header_transparent'=>true,
            'seo_meta'  => $row->getSeoMetaWithTranslation(app()->getLocale(),$translation),
            'near_post' => $near_post
        ];
        $this->setActiveMenu($row);
        return view('News::frontend.detail', $data);
    }
}
