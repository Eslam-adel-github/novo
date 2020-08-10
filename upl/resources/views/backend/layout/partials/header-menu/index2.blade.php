<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
    <button class="kt-aside-toggler kt-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item kt-menu__item--rel {{ is_active('dashboard') }}" aria-haspopup="true">
                <a href="{{ url('/') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">{{ __('main.dashboard') }}</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>

            @php
                $activeArray = [
                    'users.*',
					'branches.*',
					'jobs.*',
					'contacts.*',
					'industries.*',
					'roles.*',
					'action_status.*',
					'teams.*',
					'dev_contacts.*',
					'quality_calls.*',
					'cils.*',
					'cil_templates.*',
					'faqs.*',
					'eois.*',
					'website_settings.*',
					'deals.*',
					'blacklists.*',
					'adsenses.*',
					'platforms.*',
					'complain_comments.*',
					'currency_conversions.*',
					'documents.*',
					'lost_resons.*',
					'project_stages.*',
					'inventory_statuses.*',
					/*AddedIncludeActiveLinksHere*/
                ];

                $activeArray2 = [
                    'call_types.*',
					'questions.*',
					'deal_stages.*',
					'meeting_types.*',
					'message_types.*',
					'requests.*',
					'calls.*',
					'meetings.*',
					'lead_messages.*',
					'complain_types.*',
					'complains.*',
					'visit_types.*',
					'agent_types.*',
					'targets.*',
					'todo_types.*',
					'todos.*',
                ];

                $activeLeadsArray = [
                    'leads.*',
                    'lead_sources.*',
                    'campaigns.*',
					'lead_stages.*',
                ];

                $activeLocations = [
                    'countries.*',
					'cities.*',
					'states.*',
                ];

                $activeInventory = [
                    'inventories.*',
                    'furniture_statuses.*',
					'flooring_types.*',
					'finishing_types.*',
					'services.*',
					'contract_statuses.*',
                    'developers.*',
					'projects.*',
					'unit_views.*',
					'delivery_dates.*',
					'currencies.*',
                    'unit_types.*',
                ];
            @endphp

            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ is_active($activeArray, true) }}" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">{{ __('main.main_menu') }}</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                    <ul class="kt-menu__subnav">
                        @if (userCan("Add Users") || userCan("Edit Users") || userCan("Show Users") || userCan("Delete Users"))
                            @include('backend.layout.partials.header-menu.menuSections.users')
                        @endif
                        @if (userCan("Add Branches") || userCan("Edit Branches") || userCan("Show Branches") || userCan("Delete Branches"))
                            @include('backend.layout.partials.header-menu.menuSections.branches')
                        @endif
                        @if (userCan("Add Jobs") || userCan("Edit Jobs") || userCan("Show Jobs") || userCan("Delete Jobs"))
                            @include('backend.layout.partials.header-menu.menuSections.jobs')
                        @endif
                        @if (userCan("Add Contacts") || userCan("Edit Contacts") || userCan("Show Contacts") || userCan("Delete Contacts"))
                            @include('backend.layout.partials.header-menu.menuSections.contacts')
                        @endif
                        @if (userCan("Add Industries") || userCan("Edit Industries") || userCan("Show Industries") || userCan("Delete Industries"))
                            @include('backend.layout.partials.header-menu.menuSections.industries')
                        @endif
                        @if (userCan("Add Roles") || userCan("Edit Roles") || userCan("Show Roles") || userCan("Delete Roles"))
                            @include('backend.layout.partials.header-menu.menuSections.roles')
                        @endif
                        @if (userCan("Add Action_status") || userCan("Edit Action_status") || userCan("Delete Action_status") || userCan("Show Action_status"))
                            @include('backend.layout.partials.header-menu.menuSections.action_status')
                        @endif
                        @if (userCan("Add Teams") || userCan("Edit Teams") || userCan("Delete Teams") || userCan("Show Teams"))
                            @include('backend.layout.partials.header-menu.menuSections.teams')
                        @endif
                        @if (userCan("Add Dev_contacts") || userCan("Edit Dev_contacts") || userCan("Delete Dev_contacts") || userCan("Show Dev_contacts"))
                            @include('backend.layout.partials.header-menu.menuSections.dev_contacts')
                        @endif
                        @if (userCan("Add Quality_calls") || userCan("Edit Quality_calls") || userCan("Delete Quality_calls") || userCan("Show Quality_calls"))
                            @include('backend.layout.partials.header-menu.menuSections.quality_calls')
                        @endif
                        @if (userCan("Add Cils") || userCan("Edit Cils") || userCan("Delete Cils") || userCan("Show Cils"))
                            @include('backend.layout.partials.header-menu.menuSections.cils')
                        @endif
                        @if (userCan("Add Cil_templates") || userCan("Edit Cil_templates") || userCan("Delete Cil_templates") || userCan("Show Cil_templates"))
                            @include('backend.layout.partials.header-menu.menuSections.cil_templates')
                        @endif
                        @if (userCan("Add Faqs") || userCan("Edit Faqs") || userCan("Delete Faqs") || userCan("Show Faqs"))
                            @include('backend.layout.partials.header-menu.menuSections.faqs')
                        @endif
                        @if (userCan("Add Eois") || userCan("Edit Eois") || userCan("Delete Eois") || userCan("Show Eois"))
                            @include('backend.layout.partials.header-menu.menuSections.eois')
                        @endif
						@if (userCan('Add Website_settings') || userCan('Edit Website_settings') || userCan('Delete Website_settings') || userCan('Show Website_settings') )
							@include('backend.layout.partials.header-menu.menuSections.website_settings')
						@endif
						@if (userCan('Add Deals') || userCan('Edit Deals') || userCan('Delete Deals') || userCan('Show Deals') )
							@include('backend.layout.partials.header-menu.menuSections.deals')
						@endif
						@if (userCan('Add Adsenses') || userCan('Edit Adsenses') || userCan('Delete Adsenses') || userCan('Show Adsenses') )
							@include('backend.layout.partials.header-menu.menuSections.adsenses')
						@endif
						@if (userCan('Add Platforms') || userCan('Edit Platforms') || userCan('Delete Platforms') || userCan('Show Platforms') )
							@include('backend.layout.partials.header-menu.menuSections.platforms')
						@endif
						@if (userCan('Add Complain_comments') || userCan('Edit Complain_comments') || userCan('Delete Complain_comments') || userCan('Show Complain_comments') )
							@include('backend.layout.partials.header-menu.menuSections.complain_comments')
						@endif
						@if (userCan('Add Currency_conversions') || userCan('Edit Currency_conversions') || userCan('Delete Currency_conversions') || userCan('Show Currency_conversions') )
							@include('backend.layout.partials.header-menu.menuSections.currency_conversions')
						@endif
						@if (userCan('Add Documents') || userCan('Edit Documents') || userCan('Delete Documents') || userCan('Show Documents') )
							@include('backend.layout.partials.header-menu.menuSections.documents')
						@endif
                        @if (userCan('Add Blacklists') || userCan('Edit Blacklists') || userCan('Delete Blacklists') || userCan('Show Blacklists') )
                            @include('backend.layout.partials.header-menu.menuSections.blacklists')
                        @endif
						@if (userCan('Add Lost_resons') || userCan('Edit Lost_resons') || userCan('Delete Lost_resons') || userCan('Show Lost_resons') )
							@include('backend.layout.partials.header-menu.menuSections.lost_resons')
						@endif
						@if (userCan('Add Project_stages') || userCan('Edit Project_stages') || userCan('Delete Project_stages') || userCan('Show Project_stages') )
              @include('backend.layout.partials.header-menu.menuSections.project_stages')
						@endif
            @if (userCan("Add Inventory_statuses") || userCan("Edit Inventory_statuses") || userCan("Show Inventory_statuses") || userCan("Delete Inventory_statuses"))
                @include('backend.layout.partials.header-menu.menuSections.inventory_statuses')
            @endif
						{{--AddedIncludeSectionsHere--}}
                    </ul>
                </div>
            </li>

            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ is_active($activeArray2, true) }}" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">{{ __('main.main_menu') }}</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                    <ul class="kt-menu__subnav">
                        @if (userCan("Add Call_types") || userCan("Edit Call_types") || userCan("Delete Call_types") || userCan("Show Call_types"))
                            @include('backend.layout.partials.header-menu.menuSections.call_types')
                        @endif
                        @if (userCan("Add Questions") || userCan("Edit Questions") || userCan("Delete Questions") || userCan("Show Questions"))
                            @include('backend.layout.partials.header-menu.menuSections.questions')
                        @endif
                        @if (userCan("Add Deal_stages") || userCan("Edit Deal_stages") || userCan("Delete Deal_stages") || userCan("Show Deal_stages"))
                            @include('backend.layout.partials.header-menu.menuSections.deal_stages')
                        @endif
                        @if (userCan("Add Meeting_types") || userCan("Edit Meeting_types") || userCan("Delete Meeting_types") || userCan("Show Meeting_types"))
                            @include('backend.layout.partials.header-menu.menuSections.meeting_types')
                        @endif
						@if (userCan("Add Message_types") || userCan("Edit Message_types") || userCan("Delete Message_types") || userCan("Show Message_types"))
                            @include('backend.layout.partials.header-menu.menuSections.message_types')
                        @endif
						@if (userCan("Add Requests") || userCan("Edit Requests") || userCan("Delete Requests") || userCan("Show Requests"))
                            @include('backend.layout.partials.header-menu.menuSections.requests')
                        @endif
                        @if (userCan("Add Calls") || userCan("Edit Calls") || userCan("Delete Calls") || userCan("Show Calls"))
                            @include('backend.layout.partials.header-menu.menuSections.calls')
                        @endif
                        @if (userCan("Add Meetings") || userCan("Edit Meetings") || userCan("Delete Meetings") || userCan("Show Meetings"))
                            @include('backend.layout.partials.header-menu.menuSections.meetings')
                        @endif
                        @if (userCan("Add Lead_messages") || userCan("Edit Lead_messages") || userCan("Delete Lead_messages") || userCan("Show Lead_messages"))
                            @include('backend.layout.partials.header-menu.menuSections.lead_messages')
                        @endif
                        @if (userCan("Add Complain_types") || userCan("Edit Complain_types") || userCan("Delete Complain_types") || userCan("Show Complain_types"))
                            @include('backend.layout.partials.header-menu.menuSections.complain_types')
                        @endif
                        @if (userCan("Add Complains") || userCan("Edit Complains") || userCan("Delete Complains") || userCan("Show Complains"))
                            @include('backend.layout.partials.header-menu.menuSections.complains')
                        @endif
                        @if (userCan("Add Visit_types") || userCan("Edit Visit_types") || userCan("Delete Visit_types") || userCan("Show Visit_types"))
                            @include('backend.layout.partials.header-menu.menuSections.visit_types')
                        @endif
						@if (userCan('Add Agent_types') || userCan('Edit Agent_types') || userCan('Delete Agent_types') || userCan('Show Agent_types') )
							@include('backend.layout.partials.header-menu.menuSections.agent_types')
						@endif
						@if (userCan('Add Targets') || userCan('Edit Targets') || userCan('Delete Targets') || userCan('Show Targets') )
							@include('backend.layout.partials.header-menu.menuSections.targets')
						@endif
						@if (userCan('Add Todo_types') || userCan('Edit Todo_types') || userCan('Delete Todo_types') || userCan('Show Todo_types') )
							@include('backend.layout.partials.header-menu.menuSections.todo_types')
						@endif
						@if (userCan('Add Todos') || userCan('Edit Todos') || userCan('Delete Todos') || userCan('Show Todos') )
							@include('backend.layout.partials.header-menu.menuSections.todos')
						@endif
                    </ul>
                </div>
            </li>

            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ is_active($activeLeadsArray, true) }}" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">{{ __('main.leads') }}</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                    <ul class="kt-menu__subnav">
                        @if (userCan("Add Leads") || userCan("Edit Leads") || userCan("Show Leads") || userCan("Delete Leads"))
                            @include('backend.layout.partials.header-menu.menuSections.leads')
                        @endif
                        @if (userCan("Add Lead_sources") || userCan("Edit Lead_sources") || userCan("Show Lead_sources") || userCan("Delete Lead_sources"))
                            @include('backend.layout.partials.header-menu.menuSections.lead_sources')
                        @endif
                        @if (userCan("Add Campaigns") || userCan("Edit Campaigns") || userCan("Show Campaigns") || userCan("Delete Campaigns"))
                            @include('backend.layout.partials.header-menu.menuSections.campaigns')
                        @endif
                        @if (userCan("Add Lead_stages") || userCan("Edit Lead_stages") || userCan("Show Lead_stages") || userCan("Delete Lead_stages"))
                            @include('backend.layout.partials.header-menu.menuSections.lead_stages')
                        @endif
                    </ul>
                </div>
            </li>

            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ is_active($activeLocations, true) }}" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">{{ __('main.locations') }}</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                    <ul class="kt-menu__subnav">
                        @if (userCan("Add Countries") || userCan("Edit Countries") || userCan("Show Countries") || userCan("Delete Countries"))
                            @include('backend.layout.partials.header-menu.menuSections.countries')
                        @endif
                        @if (userCan("Add Cities") || userCan("Edit Cities") || userCan("Show Cities") || userCan("Delete Cities"))
                            @include('backend.layout.partials.header-menu.menuSections.cities')
                        @endif
                        @if (userCan("Add States") || userCan("Edit States") || userCan("Show States") || userCan("Delete States"))
                            @include('backend.layout.partials.header-menu.menuSections.states')
                        @endif
                    </ul>
                </div>
            </li>

            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ is_active($activeInventory, true) }}" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">{{ __('main.inventories') }}</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                    <ul class="kt-menu__subnav">
                        @if (userCan("Add Inventories") || userCan("Edit Inventories") || userCan("Show Inventories") || userCan("Delete Inventories"))
                            @include('backend.layout.partials.header-menu.menuSections.inventories')
                        @endif
                        @if (userCan("Add Developers") || userCan("Edit Developers") || userCan("Show Developers") || userCan("Delete Developers"))
                            @include('backend.layout.partials.header-menu.menuSections.developers')
                        @endif
                        @if (userCan("Add Projects") || userCan("Edit Projects") || userCan("Show Projects") || userCan("Delete Projects"))
                            @include('backend.layout.partials.header-menu.menuSections.projects')
                        @endif
                        @if (userCan("Add Unit_views") || userCan("Edit Unit_views") || userCan("Show Unit_views") || userCan("Delete Unit_views"))
                            @include('backend.layout.partials.header-menu.menuSections.unit_views')
                        @endif
                        @if (userCan("Add Delivery_dates") || userCan("Edit Delivery_dates") || userCan("Show Delivery_dates") || userCan("Delete Delivery_dates"))
                            @include('backend.layout.partials.header-menu.menuSections.delivery_dates')
                        @endif
                        @if (userCan("Add Currencies") || userCan("Edit Currencies") || userCan("Show Currencies") || userCan("Delete Currencies"))
                            @include('backend.layout.partials.header-menu.menuSections.currencies')
                        @endif
                        @if (userCan("Add Unit_types") || userCan("Edit Unit_types") || userCan("Show Unit_types") || userCan("Delete Unit_types"))
                            @include('backend.layout.partials.header-menu.menuSections.unit_types')
                        @endif
                        @if (userCan("Add Furniture_statuses") || userCan("Edit Furniture_statuses") || userCan("Show Furniture_statuses") || userCan("Delete Furniture_statuses"))
                            @include('backend.layout.partials.header-menu.menuSections.furniture_statuses')
                        @endif
                        @if (userCan("Add Flooring_types") || userCan("Edit Flooring_types") || userCan("Show Flooring_types") || userCan("Delete Flooring_types"))
                            @include('backend.layout.partials.header-menu.menuSections.flooring_types')
                        @endif
                        @if (userCan("Add Finishing_types") || userCan("Edit Finishing_types") || userCan("Show Finishing_types") || userCan("Delete Finishing_types"))
                            @include('backend.layout.partials.header-menu.menuSections.finishing_types')
                        @endif
                        @if (userCan("Add Services") || userCan("Edit Services") || userCan("Show Services") || userCan("Delete Services"))
                            @include('backend.layout.partials.header-menu.menuSections.services')
                        @endif
                        @if (userCan("Add Contract_statuses") || userCan("Edit Contract_statuses") || userCan("Show Contract_statuses") || userCan("Delete Contract_statuses"))
                            @include('backend.layout.partials.header-menu.menuSections.contract_statuses')
                        @endif
                        @if (userCan("Show System_logs"))

                        @endif
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
