<div class="field">
    <label class="label">Address</label>
</div>




<div class="field is-horizontal">

    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <label class="label">Primary contact</label>
                <input id="door_number" type="text" class="input" name="door_number" value="{{ isset($item->address->door_number)? $item->address->door_number : old('door_number') }}" placeholder="No" />
            </div>
        </div>
        <div class="field">
            <div class="control is-expanded">
                <label class="label">Contact No.</label>
                <input id="street" type="text" class="input" name="street" value="{{ isset($item->address->street)? $item->address->street : old('street') }}" placeholder="Street">
            </div>
        </div>
    </div>
</div>



<div class="field is-horizontal">

    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <label class="label">Door number</label>
                <input id="door_number" type="text" class="input" name="door_number" value="{{ isset($item->address->door_number)? $item->address->door_number : old('door_number') }}" placeholder="No" />
            </div>
        </div>
        <div class="field">
            <div class="control is-expanded">
                <label class="label">Street</label>
                <input id="street" type="text" class="input" name="street" value="{{ isset($item->address->street)? $item->address->street : old('street') }}" placeholder="Street">
            </div>
        </div>
    </div>
</div>



<div class="field is-horizontal">
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <label class="label">City</label>
                <input id="city" type="text" class="input" name="city" value="{{ isset($item->address->city)? $item->address->city : old('city') }}" placeholder="City">
            </div>
        </div>
        <div class="field">
            <div class="control is-expanded">
                <label class="label">State</label>
                <input id="state" type="text" class="input" name="state" value="{{ isset($item->address->state)? $item->address->state : old('state') }}" placeholder="State">
            </div>
        </div>
    </div>
</div>



<div class="field is-horizontal">
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <label class="label">Postcode</label>
                <input id="postcode" type="text" class="input" name="postcode" value="{{ isset($item->address->postcode)? $item->address->postcode : old('postcode') }}" placeholder="Postcode">
            </div>
        </div>
        <div class="field">
            <div class="control is-expanded">
                <label class="label">State</label>

                <div class="select is-block">
                    <select>

                    </select>
                </div>
            </div>
        </div>
    </div>
</div>



