

<div id="contact" class="container text-center">
    <x-alert-component />
    <h2>{{ __('Contact Us') }}</h2>
    <p>{{ __('Have questions or feedback? Reach out to us!') }}</p>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" wire:model="name" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" wire:model="email" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="5" wire:model="message" placeholder="Your Message"></textarea>
                </div>
                <button type="button" wire:click="submitContact()" class="btn btn-primary" style="
                background-color: #f1ac06;border: unset;">{{ __('Send') }}</button>
            </form>
        </div>
    </div>
</div>
