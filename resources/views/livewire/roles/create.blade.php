<form class="form form-horizontal">
    <div class="row">

        <x-input-component label="Role Name" name="name"
            icon='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>'
            placeholder="Enter the role name" />


        @php
            $guards = [];
            foreach (App\Models\Role::GURDS as $g) {
                $guards[$g] = ucfirst(__($g));
            }
        @endphp
        <x-select-component label="Guard" name="guard" :options="$guards"
            icon='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>' />

        <x-actions-component submitLabel="Save" action="save()" />
    </div>
