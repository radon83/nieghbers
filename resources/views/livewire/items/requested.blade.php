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
                                aria-label="Item: activate to sort column ascending">{{ __('FEEs') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Allow Time (In days)') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Duration (From / To)') }}
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Requested') }}</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 155.375px;"
                                aria-label="Actions"> {{ __('Status') }} </th>
                            @if (authorized('Approve requested items') || authorized('Cancelate requested items'))
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
                                        $photo = !is_null($item->item()->first()->images)
                                            ? json_decode($item->item()->first()->images)[0]
                                            : '';
                                    @endphp

                                    @if ($photo)
                                        <div class="avatar avatar-lg">
                                            <img src="{{ Storage::url($photo) }}" alt="{{ $item->name_en }}">
                                        </div>
                                    @else
                                        #
                                    @endif
                                </td>
                                <td>{{ $item->item()->first()->name_ar }}</td>
                                <td>{{ $item->item()->first()->name_en }}</td>
                                <td>{{ $item->item()->first()->description_en }}</td>
                                <td>{{ $item->item()->first()->description_ar }}</td>
                                <td>{{ $item->item()->first()->fee }}</td>
                                <td>{{ $item->item()->first()->allow_time }}</td>
                                <td>{{ $item->date . ' / ' . $item->end_date }}</td>
                                <td>
                                    <a
                                        href="{{ route('users.edit', Crypt::encrypt($item->user()->first()->id)) }}">{{ $item->user()->first()->fname }}</a>
                                </td>
                                <td>
                                    @php
                                        $status =
                                            $item->status == 'applied'
                                                ? 'warning'
                                                : ($item->status == 'approved'
                                                    ? 'success'
                                                    : 'danger');
                                    @endphp
                                    <span
                                        class="badge badge-glow bg-{{ $status }}">{{ ucfirst(__($item->status)) }}</span>
                                </td>

                                @if (authorized('Approve requested items') || authorized('Cancelate requested items'))
                                    <td>
                                        @if ($item->status == 'applied')
                                            <div class="dropdown">
                                                <button type="button"
                                                    class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                        height="14" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-more-vertical">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    @if (authorized('Approve requested items'))
                                                        <a class="dropdown-item"
                                                            wire:click="takeAction('approved', '{{ Crypt::encrypt($item->id) }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-check-circle">
                                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                            </svg>
                                                            <span>{{ __('Approve') }}</span>
                                                        </a>
                                                    @endif

                                                    @if (authorized('Cancelate requested items'))
                                                        <a class="dropdown-item"
                                                            wire:click="takeAction('canceled', '{{ Crypt::encrypt($item->id) }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x-octagon">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="15" y1="9" x2="9"
                                                                    y2="15"></line>
                                                                <line x1="9" y1="9" x2="15"
                                                                    y2="15"></line>
                                                            </svg>
                                                            <span>{{ __('Cancel') }}</span>
                                                        </a>
                                                    @endif

                                                </div>
                                            </div>
                                        @else
                                            #
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

        <div class="modal fade text-start modal-warning" id="warning" tabindex="-1" wire:ignore
            aria-labelledby="myModalLabel140" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel140">{{ __('Cancel Borrow Order') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('After you complete the cancelation process of this item, you can re-borrow it again only via request a new borrow request!') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" wire:click="submitCancellationBorrow()"
                            data-bs-dismiss="modal">{{ __('Accept') }}</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- list section end -->
</section>
