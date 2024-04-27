<section class="app-item-list">
    <x-alert-component />

 
    <!-- list section start -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                    <div class="col-sm-12 col-md-4 col-lg-6">
                        <div class="dataTables_length" id="DataTables_Table_0_length"><label>{{__('Show')}} <select
                                    wire:model="paginator" name="DataTables_Table_0_length"
                                    aria-controls="DataTables_Table_0" class="form-select">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> {{__('entries')}} </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-6 ps-xl-75 ps-0">
                        <div
                            class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end align-items-center flex-sm-nowrap flex-wrap me-1">
                            <div class="me-1">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label> {{__('Search:')}} <input type="search" wire:model="searchTerm" class="form-control"
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
                                aria-label="Item: activate to sort column ascending">{{ __('Time allowed(In days)') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('Duration (From / To)') }}
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Item: activate to sort column ascending">{{ __('User') }}</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 155.375px;"
                                aria-label="Actions"> {{ __('Status') }} </th>
                            @if (authorized('Cancelate applied items'))
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
                                    {{ $item->item()->first()->user()->first()->fname }}
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

                                @if (authorized('Cancelate applied items'))
                                    <td>
                                        @if ($item->status == 'applied')
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#warning"
                                           
                                                class="btn btn-warning waves-effect waves-float waves-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x-octagon">
                                                    <polygon
                                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                    </polygon>
                                                    <line x1="15" y1="9" x2="9"
                                                        y2="15">
                                                    </line>
                                                    <line x1="9" y1="9" x2="15"
                                                        y2="15">
                                                    </line>
                                                </svg>
                                                <span>{{ __('Cancel') }}</span>
                                            </button>
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
                                                        <button type="button" class="btn btn-warning" wire:click="submitCancellationBorrow({{$item->id}})"
                                                            data-bs-dismiss="modal">{{ __('Accept') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @elseif ($item->status == 'approved')
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
        <div class="modal fade modal-info text-start" id="info" tabindex="-1" wire:ignore
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel130">{{ __('User Information') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <x-input-component label="User Name" name="userName" type="text"
                        icon='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>' />
                    <x-input-component label="Email" name="email" type="email"
                        icon='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>' />
                    <x-input-component label="Phone Number" name="phoneNumber" type="tel"
                        icon='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M16 2a2 2 0 0 1 2 2v0a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v0a2 2 0 0 1 2-2h1"></path><path d="M15 22h2a2 2 0 0 1 2 2v0a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v0a2 2 0 0 1 2-2z"></path><path d="M4 4h3a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-12a2 2 0 0 1 2-2z"></path></svg>' />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal"
                        wire:click="applyItem()">{{ __('Apply') }}</button>
                </div>
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
