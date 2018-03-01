@if (auth()->check())
    <div class="card checkouts-prescription-card">
        <div class="card-content">

            <div class="field">
                <h1 class="title is-4 is-spaced">Add Prescription</h1>
                <div class="control">



                  <div class="file has-name is-boxed is-centered">
                    <label class="file-label">
                      <input class="file-input" name="prescription" id="prescription" type="file"
                             accept='image/*'>
                      <span class="file-cta">
                        <span class="file-icon">
                          <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                          Choose a file…
                        </span>
                      </span>
                      <span class="file-name" id="imagename">
                      </span>
                    </label>
                  </div>

                    <p class="help">The prescription must be upload to make an order.</p>

                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        var file = document.getElementById("prescription");
        file.onchange = function () {
            if (file.files.length > 0) {
                document.getElementById('imagename').innerHTML = file.files[0].name;
            }
        };
    </script>

@endif
