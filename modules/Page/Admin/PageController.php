<?php
namespace Modules\Page\Admin;

use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Page\Models\Page;
use Modules\Page\Models\PageTranslation;
use Modules\Template\Models\Template;

class PageController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/page');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('page_manage');
        $page_name = $request->query('page_name');
        $datapage = new Page();
        if ($page_name) {
            $datapage = Page::where('title', 'LIKE', '%' . $page_name . '%');
        }
        $datapage = $datapage->orderBy('title', 'asc');
        $data = [
            'rows'        => $datapage->paginate(20),
            'page_title'=>__("Page Management"),
            'breadcrumbs' => [
                [
                    'name' => __('Pages'),
                    'url'  => 'admin/module/page'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Page::admin.index', $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission('page_manage');
        $row = new Page();
        $row->fill([
            'status' => 'publish',
        ]);

        $data = [
            'row'         => $row,
            'translation'=>new PageTranslation(),
            'templates'   => Template::orderBy('id', 'desc')->limit(100)->get(),
            'breadcrumbs' => [
                [
                    'name' => __('Pages'),
                    'url'  => 'admin/module/page'
                ],
                [
                    'name'  => __('Add Page'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Page::admin.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('page_manage');
        $row = Page::find($id);

        if (empty($row)) {
            return redirect('admin/module/page');
        }
        $translation = $row->translateOrOrigin($request->query('lang'));

        $data = [
            'translation'  => $translation,
            'row'            =>$row,
            'templates'   => Template::orderBy('id', 'desc')->limit(100)->get(),
            'breadcrumbs' => [
                [
                    'name' => __('Pages'),
                    'url'  => 'admin/module/page'
                ],
                [
                    'name'  => __('Edit Page'),
                    'class' => 'active'
                ],
            ],
            'enable_multi_lang'=>true
        ];
        return view('Page::admin.detail', $data);
    }

    public function store(Request $request, $id){
        $this->checkPermission('page_manage');
        if($id>0){
            $row = Page::find($id);
            if (empty($row)) {
                return redirect(route('page.admin.index'));
            }
        }else{
            $row = new Page();
        }
        $row->fill($request->input());
        if($request->input('slug')){
            $row->slug = $request->input('slug');
        }
        $row->saveOriginOrTranslation($request->query('lang'),true);
        if($id > 0 ){
            return back()->with('success',  __('Page updated') );
        }else{
            return redirect()->route('page.admin.edit',['id'=>$row->id])->with('success', $id > 0 ?  __('Page updated') : __('Page created'));
        }
    }

    public function getForSelect2(Request $request)
    {
        $q = $request->query('q');
        $query = Page::select('id', 'title as text');
        if ($q) {
            $query->where('title', 'like', '%' . $q . '%');
        }
        $res = $query->orderBy('id', 'desc')->limit(20)->get();
        return response()->json([
            'results' => $res
        ]);
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('page_manage');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids)) {
            return redirect()->back()->with('error', __('Please select at least 1 item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('No Action is selected!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = Page::where("id", $id);
                $query->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        } else {
            foreach ($ids as $id) {
                $query = Page::where("id", $id);
                $query->update(['status' => $action]);
            }
        }
        return redirect()->back()->with('success', __('Update success!'));
    }
    public function toBuilder($id){
        $row = Page::find($id);

        if (empty($row)) {
            return redirect(route('page.admin.index'));
        }
        if(!$row->template){
            $temp = new Template(
                [
                    'title'=>$row->title
                ]
            );
            $temp->save();
            $row->template_id = $temp->id;
        }
        $row->show_template = 1;
        $row->save();

        return redirect(route('template.admin.edit',['id'=>$row->template_id,'ref'=>'page','refId'=>$id]));
    }
}
