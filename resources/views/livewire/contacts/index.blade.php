<section class="app-contact-list">
    <x-alert-component />

    <!-- contacts filter start -->
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
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-contact">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
                </svg>' />
            </div>
        </div>
    </div>
    <!-- contacts filter end -->
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
                            {{-- <div class="dt-buttons btn-group flex-wrap"><a class="btn add-new btn-primary mt-50"
                                    tabindex="0"
                                    href="{{ route('contacts.create') }}"><span>{{ __('Add New Contact') }}</span></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <table class="contact-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0"
                    contact="grid" aria-describedby="DataTables_Table_0_info">
                    <thead class="table-light">
                        <tr contact="row">
                            <th class="control sorting_disabled" rowspan="1" colspan="1"
                                style="width: 41.3125px; display: none;" aria-label=""></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Contact: activate to sort column ascending">{{ __('Name') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Contact: activate to sort column ascending">{{ __('Email') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 120.25px;"
                                aria-label="Contact: activate to sort column ascending">{{ __('Message') }}</th>

                            @if (authorized('Delete contact'))
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 155.375px;"
                                    aria-label="Actions"> {{ __('Actions') }} </th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd" wire:loading>
                            <td valign="top" colspan="6" class="dataTables_empty">{{ __('Loading...') }}</td>
                        </tr>

                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->message }}</td>

                                @if (authorized('Delete contact'))
                                    <td>
                                        <div class="dropdown">
                                            <button type="button"
                                                class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu" style="">

                                                @if (authorized('Delete contact'))
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        wire:click="saveAdminWillDeleted('{{ Crypt::encrypt($contact->id) }}')"
                                                        data-bs-target="#danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-trash me-50">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                        </svg>
                                                        <span> {{ __('Delete') }} </span>
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mx-2 row m-1">
                    {{ $contacts->links() }}
                </div>

            </div>
        </div>

        <div class="modal fade modal-danger text-start" id="danger" tabindex="-1" wire:ignore
            aria-labelledby="myModalLabel120" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel120">{{ __('Delete Contact') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('After you delete this contact, system can keep his information for 30 days only. You can back them up before end this time.') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect waves-float waves-light"
                            wire:click="deleteAdmin()" data-bs-dismiss="modal">{{ __('Accept') }}</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- list section end -->
</section>
