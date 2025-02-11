<form action="{{ route('admin.store-something', $identities ? $identities->id : '') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @if ($membership)
        @method('PUT')
    @endif
    <div class="row">
        <div class="mb-3 col-md-3">
            <label for="primary_identity" class="form-label">Primary Identity *</label>
            <input type="text" id="primary_identity" value="{{ $primaryIdentity->name }}" class="form-control" readonly>
        </div>

        <div class="mb-3 col-md-3">
            <label for="identity_value" class="form-label">Identity Number*</label>
            @component('components.member-identity-type-component', [
                'name' => 'identity_value',
                'value' => old('identity_value', $identities?->identity_value),
                'id' => 'primary_identity_value',
                'isRequired' => true,
                'placeHolder' => 'Identity Number',
                'maxLength' => 15,
                'class' => '',
            ])
            @endcomponent
            <span class="error-message">
                @error('identity_value')
                    <strong>{{ $message }}</strong>
                @enderror
            </span>
        </div>

    </div>
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-accent-outline">Save</button>
    </div>
</form>
</div>
<div>
    <form action="{{ route('admin.store-something-else', $secondIdentity ? $secondIdentity->id : '') }}" method="POST"
        id="membershipForm" enctype="multipart/form-data">
        @csrf
        @if ($membership)
            @method('PUT')
        @endif

        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="secondary_identity" class="form-label">Seondary Identity *</label>
                <input type="text" id="secondary_identity" value="{{ $company->PMSConfig->secondaryIdentity->name }}"
                    class="form-control" readonly>
            </div>

            <div class="mb-3 col-md-3">
                <label for="identity_value" class="form-label">Identity Number*</label>
                @component('components.member-identity-type-component', [
                    'name' => 'identity_value',
                    'value' => old('identity_value', $secondIdentity?->identity_value),
                    'id' => 'secondary_identity_value',
                    'isRequired' => false,
                    'placeHolder' => 'Identity Number',
                    'maxLength' => 8,
                    'class' => '',
                ])
                @endcomponent
                <span class="error-message">
                    @error('identity_value')
                        <strong>{{ $message }}</strong>
                    @enderror
                </span>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-accent-outline">Save</button>
            </div>
    </form>
</div>

</div>
