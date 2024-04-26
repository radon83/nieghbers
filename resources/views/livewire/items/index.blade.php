<section class="app-item-list">
    <x-alert-component />

    <!-- items filter start -->
    <div class="card">
        <h5 class="card-header">{{ __('Search Filter') }}</h5>
        <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
            <div class="col-md-12 user_status">
                <x-select-component label="Avilability" name="availability" :options="[
                    true => __('Trashed'),
                    false => __('Not Trashed'),
                ]"
                    icon='<svg xmlns="http://www.w3.org/2000/svg"
                width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-item">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
                </svg>' />
            </div>
        </div>
    </div>
    <!-- items filter end -->
    <!-- list section start -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                    <div class="col-sm-12 col-md-4 col-lg-6">
                        <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                    wire:model="paginator" name="DataTables_Table_0_length"
                                    aria-controls="DataTables_Table_0" class="form-select">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-6 ps-xl-75 ps-0">
                        <div
                            class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end align-items-center flex-sm-nowrap flex-wrap me-1">
                            <div class="me-1">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>Search:<input type="search" wire:model="searchTerm" class="form-control"
                                            placeholder="" aria-controls="DataTables_Table_0"></label>
                                </div>
                            </div>
                            <div class="dt-buttons btn-group flex-wrap"><a class="btn add-new btn-primary mt-50"
                                    tabindex="0"
                                    href="{{ route('items.create') }}"><span>{{ __('Add New Item') }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="item-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0"
                    item="grid" aria-describedby="DataTables_Table_0_info">
                    <thead class="table-light">
                        <tr item="row">
                            <th class="control sorting_disabled" rowspan="1" colspan="1"
                                style="width: 41.3125px; display: none;" aria-label=""></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Image/s') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Item AR') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Item EN') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Description EN') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Description AR') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('FEEs/$') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Allowed Time (In days)') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('In-City') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('In-Place') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Category') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Owner') }}</th>

                            @if (authorized('Apply for item'))
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 155.375px;"
                                    aria-label="Actions"> {{ __('Actions') }} </th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd" wire:loading>
                            <td valign="top" colspan="6" class="dataTables_empty">{{ __('Loading...') }}</td>
                        </tr>

                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    @php
                                        $photo = !is_null($item->images) ? json_decode($item->images)[0] : '';
                                    @endphp

                                    @if ($photo)
                                        <div class="avatar avatar-lg">
                                            <img src="{{ Storage::url($photo) }}" alt="{{ $item->name_en }}">
                                        </div>
                                    @else
                                        #
                                    @endif
                                </td>
                                <td>{{ $item->name_ar }}</td>
                                <td>{{ $item->name_en }}</td>
                                <td>{{ $item->description_en }}</td>
                                <td>{{ $item->description_ar }}</td>
                                <td>{{ $item->fee . '$' }}</td>
                                <td>{{ $item->allow_time . 'M' }}</td>
                                <td>
                                    @if (getUserGuard() == 'admin')
                                        <a
                                            href="{{ route('cities.edit', Crypt::encrypt($item->city_id)) }}">{{ session('lang') == 'ar' ? $item->city()->first()->name_ar : $item->city()->first()->name_en }}</a>
                                    @else
                                        {{ session('lang') == 'ar' ? $item->city()->first()->name_ar : $item->city()->first()->name_en }}
                                    @endif
                                </td>
                                <td>
                                    @if (getUserGuard() == 'admin')
                                        <a href="{{ route('places.edit', Crypt::encrypt($item->place_id)) }}">
                                            {{ session('lang') == 'ar' ? $item->place()->first()->name_ar : $item->place()->first()->name_en }}</a>
                                    @else
                                        {{ session('lang') == 'ar' ? $item->place()->first()->name_ar : $item->place()->first()->name_en }}
                                    @endif
                                </td>
                                <td>
                                    @if (getUserGuard() == 'admin')
                                    <a href="{{ route('categories.edit', Crypt::encrypt($item->category_id)) }}">
                                        {{ session('lang') == 'ar' ? $item->category()->first()->name_ar : $item->category()->first()->name_en }}</a>
                                    @else
                                        {{ session('lang') == 'ar' ? $item->category()->first()->name_ar : $item->category()->first()->name_en }}
                                    @endif
                                </td>
                                <td>
                                    @if (getUserGuard() == 'admin' || auth()->user()->id == $item->user()->first()->id)
                                        <a
                                            href="{{ route('users.edit', Crypt::encrypt($item->user()->first()->id)) }}">{{ $item->user()->first()->fname }}</a>
                                    @else
                                        {{ $item->user()->first()->fname }}
                                    @endif

                                </td>

                                @if (authorized('Apply for item'))
                                    <td>

                                        @if ($item->user()->first()->id == auth()->user()->id)
                                            #
                                        @else
                                            @if (App\Models\ApplyItems::where([['user_id', '=', auth()->user()->id], ['item_id', '=', $item->id]])->exists())
                                                @php
                                                    $appliedItem = App\Models\ApplyItems::where([
                                                        ['user_id', '=', auth()->user()->id],
                                                        ['item_id', '=', $item->id],
                                                    ])->first();
                                                    $status =
                                                        $appliedItem->status == 'applied'
                                                            ? 'warning'
                                                            : ($appliedItem->status == 'approved'
                                                                ? 'success'
                                                                : 'danger');
                                                @endphp
                                                <span
                                                    class="badge badge-glow bg-{{ $status }}">{{ ucfirst(__($appliedItem->status)) }}</span>
                                            @else
                                                <button type="button"
                                                    wire:click="saveApplyItem('{{ Crypt::encrypt($item->id) }}')"
                                                    data-bs-toggle="modal" data-bs-target="#info"
                                                    class="btn btn-icon btn-outline-primary waves-effect">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-command">
                                                        <path
                                                            d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            @endif
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mx-2 row m-1">
                    {{ $items->links() }}
                </div>

            </div>
        </div>

        <div class="modal fade modal-danger text-start" id="danger" tabindex="-1" wire:ignore
            aria-labelledby="myModalLabel120" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel120">{{ __('Delete Item') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('After you delete this item, system can keep his information for 30 days only. You can back them up before end this time.') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect waves-float waves-light"
                            wire:click="deleteAdmin()" data-bs-dismiss="modal">{{ __('Accept') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-info text-start" id="info" tabindex="-1" wire:ignore
            aria-labelledby="myModalLabel130" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel130">{{ __('Apply Item') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('After apply the request, you can take action about item from dashboard page.') }}
                        <x-input-component label="At Date" name="applyDate" type="date"
                            icon='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>' />
                        <x-input-component label="End Date" name="endDate" type="date"
                            icon='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>' />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal"
                            wire:click="applyItem()">{{ __('Apply') }}</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- list section end -->
</section>
