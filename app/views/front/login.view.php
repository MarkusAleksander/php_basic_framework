<main class="container">
    <div class="row">
        <div class="col s12">
            <div class="section">
                <h2>Login</h2>

                <form class="row" action="/login" method="POST" enctype="multipart/form-data">
                    <div class="input-field col s6">
                        <input placeholder="Email" id="email" type="email" class="validate" name="email" />
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Password" id="password" type="password" class="validate" name="password" />
                        <label for="password">Passoword</label>
                    </div>
                    <div class="col s12">
                        <button class="btn waves-effect waves-light" type="submit">Login
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>