@if ($errors->any())
    <div class="message is-danger">
        <div class="message-body">
            <p>There is {{ $errors->count()  }} error (s) with this customer creation</p>
        </div>
    </div>
    <br>
@endif
{{ csrf_field() }}



        <div class="card">
            <div class="card-content">

                <div class="field">
                    <label for="code">Discount code</label>

                    <div class="control is-expanded">
                        <input
                                id="code"
                                type="text"
                                name="code"
                                class="input {{ $errors->has('code') ? ' is-danger' : '' }}"
                                value="{{ isset($item->code)? $item->code : old('code') }}"
                                 />
                    </div>
                    @if ($errors->has('code'))
                        <span class="help is-danger">
                                    {{ $errors->first('code') }}
                                </span>
                    @endif
                </div>



                <div class="field">
                    <label for="reward_type">offer type</label>
                    <div class="control is-expanded">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="reward_type" value="fixed" {{ isset($item) && $item->reward_type == "fixed" || old('reward_type') == "fixed" ? "checked" : "" }} />
                                Fixed
                            </label>
                            <label class="radio">
                                <input type="radio" name="reward_type" value="percent" {{ isset($item) && $item->reward_type == "percent" || old('reward_type') == "percent" ? "checked" : "" }} />
                                Percent
                            </label>

                        </div>


                   {{--
                        <input
                                id="reward_type"
                                type="email"
                                name="reward_type"
                                class="input {{ $errors->has('reward_type') ? ' is-danger' : '' }}"
                                value="{{ isset($item->email)? $item->email : old('reward_type') }}"  />
                    --}}
                    </div>
                    @if ($errors->has('reward_type'))
                        <span class="help is-danger">
                        {{ $errors->first('reward_type') }}
                    </span>
                    @endif
                </div>


                <div class="field">
                    <label for="reward">Discount</label>
                    <div class="control is-expanded">
                        <input
                                id="reward"
                                type="text"
                                name="reward"
                                class="input {{ $errors->has('reward') ? ' is-danger' : '' }}"
                                value="{{ isset($item->reward)? $item->reward : old('reward') }}"  />

                    </div>
                    @if ($errors->has('reward'))
                        <span class="help is-danger">
                        {{ $errors->first('reward') }}
                    </span>
                    @endif
                </div>


                <div class="field">
                    <label for="expires_at">Expiry date</label>
                    <div class="control is-expanded">
                        <input
                                id="expires_at"
                                type="date"
                                name="expires_at"
                                class="input {{ $errors->has('expires_at') ? ' is-danger' : '' }}"
                                value="{{ isset($item->expires_at)? $item->expires_at->format('Y-m-d') : old('expires_at') }}"  />

                    </div>
                    @if ($errors->has('expires_at'))
                        <span class="help is-danger">
                        {{ $errors->first('expires_at') }}
                    </span>
                    @endif
                </div>

                <div class="content">
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link" type="submit">
                                Save changes
                            </button>
                        </div>

                    </div>

        </div>
