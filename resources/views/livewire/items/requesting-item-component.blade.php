<div>
    <div class="bg-white p-2">
    <form class="form form-hoitemzontal">
        <div class="row">

            <div class="group-title">
                <h2>Request {{ session('lang') == 'ar' ? $item->name_ar : $item->name_en }} Item </h2>
            </div>
          
            <h4 class="review-mini-title">Owner: {{$item->user->fname}}</h4>
               
            <div style="padding-left: 10%;padding-bottom: 28px; ">
                
 
                <!-- Single Review List Start -->
            
                <span>Note:</span><br>
                
                <label>* if any damage or lost for the item user have to pay {{$item->fee}} $</label><br>
                <label>* the max. allowed days to borrow the item is {{$item->allow_time}}</label><br>
                <label>* if a user didn't return the item in the agreed day, he/she has to pay {{$item->fee}} $</label>
            </div>



            <x-input-component label="" name="item_id" type="hidden"/>


            <!-- Issue Date Input -->
            <x-input-component label="Issue Date" name="issued_date" type="date"
                icon='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>'
                placeholder="Select the issue date" />
    
            <!-- Return Date Input -->
            <x-input-component label="Return Date" name="return_date" type="date"
                icon='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>'
                placeholder="Select the return date" />

    
            <!-- Actions Component for form submission -->
            <x-actions-component submitLabel="Save" action="save()" />
        </div>
    </form>
    </div>
</div>
