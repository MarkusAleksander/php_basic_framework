<main class="container">
    <div class="row">
        <div class="col s12">
            <div class="section">
                <h2>Register</h2>
                <form class="row" action="/register" method="POST" enctype="multipart/form-data">
                    <div class="col s6">
                        <div class="input-field">
                            <input placeholder="First Name" id="first_name" type="text" class="validate" name="first_name" />
                            <label for="first_name">First Name</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input placeholder="Last Name" id="last_name" type="text" class="validate" name="last_name" />
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Email" id="email" type="email" class="validate" name="email" />
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Password" id="password" type="password" class="validate" name="password" />
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Confirm Password" id="confirm_password" type="password" class="validate" name="confirm_password" />
                        <label for="confirm_password">Confirm Passoword</label>
                    </div>
                    <div class="col s12">
                        <button class="btn waves-effect waves-light" type="submit">Register
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>