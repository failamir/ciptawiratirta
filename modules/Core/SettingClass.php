<?php

	namespace Modules\Core;

	use Modules\Core\Abstracts\BaseSettingsClass;

	class SettingClass extends BaseSettingsClass
	{
		const UPLOAD_DRIVER=['uploads','s3'];
		const BROADCAST_DRIVER=["null","log","pusher"];
		public static function getSettingPages()
		{
            $general_configs = [
                'general' => [
                    'id'   => 'general',
                    'title' => __("General Settings"),
                    'position' => 1,
                    'view'      => "Core::admin.settings.groups.general",
                    "keys"      => [
                        'site_title',
                        'site_desc',
                        'site_favicon',
                        'phone_contact',
                        'home_page_id',
                        'logo_id',
                        'logo_white_id',
                        'footer_style',
                        'copyright',
                        'footer_socials',
                        'footer_info_text',
                        'list_widget_footer',
                        'date_format',
                        'site_timezone',
                        'site_locale',
                        'site_first_day_of_the_weekin_calendar',
                        'site_enable_multi_lang',
                        'enable_rtl',
                        'page_contact_lists',
                        'page_contact_iframe_google_map',
                        'contact_call_to_action_title',
                        'contact_call_to_action_sub_title',
                        'contact_call_to_action_button_text',
                        'contact_call_to_action_button_link',
                        'contact_call_to_action_image',
                        'enable_preloader',
                        'terms_and_conditions_id',

                    ]
                ]
            ];

            $general_configs = apply_filters(Hook::CORE_SETTING_GENERAL_CONFIG, $general_configs);

            $advance_configs = [
                'advance'=>[
                    'id'   => 'advance',
                    'title' => __("Advance Settings"),
                    'position'=>80,
					'view'      => "Core::admin.settings.groups.advance",
					"keys"      => [
                        'map_provider',
                        'map_gmap_key',
                        'default_location_lat',
                        'default_location_lng',
                        'google_client_secret',
                        'google_client_id',
                        'google_enable',
                        'facebook_client_secret',
                        'facebook_client_id',
                        'facebook_enable',
                        'twitter_enable',
                        'twitter_client_id',
                        'twitter_client_secret',
                        'linkedin_enable',
                        'linkedin_client_id',
                        'linkedin_client_secret',
                        'recaptcha_enable',
                        'recaptcha_api_key',
                        'recaptcha_api_secret',
                        'head_scripts',
                        'body_scripts',
                        'footer_scripts',
                        'size_unit',

                        'cookie_agreement_enable',
                        'cookie_agreement_button_text',
                        'cookie_agreement_content',

                        'broadcast_driver',
                        'pusher_api_key',
                        'pusher_api_secret',
                        'pusher_app_id',
                        'pusher_cluster',


                        'enable_cookie_consent',
                        'cookie_consent_title',
                        'cookie_consent_desc',

                        'cookie_consent_primary_btn_text',
                        'cookie_consent_primary_btn_role',
                        'cookie_consent_secondary_btn_text',
                        'cookie_consent_secondary_btn_role',

                        'cookie_consent_setting_modal_title',
                        'cookie_consent_setting_modal_save',
                        'cookie_consent_setting_modal_accept',
                        'cookie_consent_setting_modal_reject',
                        'cookie_consent_setting_modal_block_list'
					],
                    'filter_demo_mode'=>[
                        'head_scripts',
                        'body_scripts',
                        'footer_scripts',
                        'cookie_agreement_content',
                        'cookie_agreement_button_text',
                    ]
                ],
                'style'=>[
                    'id'   => 'style',
                    'title' => __("Style Settings"),
                    'position'=>70,
                    'keys'=>[
                        'enable_preloader',
                        'preloader_image',
                        'style_main_color',
                        'style_custom_css',
                        'style_typo',
                    ],
                    'filter_demo_mode'=>[
                        'style_custom_css',
                        'style_typo',
                    ]
                ],
			];

            $advance_configs = apply_filters(Hook::CORE_SETTING_ADVANCE_CONFIG, $advance_configs);

            return array_merge($general_configs, $advance_configs);
		}
	}
