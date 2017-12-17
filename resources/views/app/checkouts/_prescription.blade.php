@if (auth()->check())
    <div class="card">
        <div class="card-content">

            <div class="field">
                <h1 class="title is-4 is-spaced">Add Prescription</h1>
                <div class="control">
                    <div class="file has-name is-fullwidth">
                        <label class="file-label">
                            <input class="file-input" name="prescription" id="prescription" type="file" multiple accept='image/*'>
                            <span class="file-cta">
                        <span class="file-icon">
                            <i class="fa fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Choose a file…
                        </span>
                        </span>
                            <span id="imagename" class="file-name">
                        </span>
                        </label>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        var file = document.getElementById("prescription");
        file.onchange = function(){
            if(file.files.length > 0)
            {
                document.getElementById('imagename').innerHTML = file.files[0].name;
            }
        };
    </script>

@endif