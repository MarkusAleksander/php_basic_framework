<main class="container">
    <div class="row">
        <div class="col s12">
            <div class="section">
                <h2>Contact</h2>

                <form class="row" action="/contact" method="POST" enctype="multipart/form-data">
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="first_name" />
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="last_name" type="text" class="validate" name="last_name" />
                        <label for="last_name">Last Name</label>
                    </div>
                    <div class="col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>