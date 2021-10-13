<main class="container">
    <div class="row">
        <div class="col s12">
            <div class="section">
                <h2>Register</h2>

                <?php $form = \Core\Form\Form::begin('/register', 'POST', 'row'); ?>
                <div class="col s6">
                    <?php $form->createField([
                        'label' => 'First Name',
                        'placeholder' => 'First Name',
                        'name' => 'first_name',
                        'type' => 'text',
                        'field_class' => 'input-field',
                        'input_class' => 'validate',
                        'input_error_class' => 'invalid',
                        'is_valid' => isset($errors) && array_key_exists('first_name', $errors),
                        'input' => isset($input) && array_key_exists('first_name', $input) ? $input["first_name"] : "",
                    ]); ?>
                </div>
                <div class="col s6">
                    <?php $form->createField([
                        'label' => 'Last Name',
                        'placeholder' => 'Last Name',
                        'name' => 'last_name',
                        'type' => 'text',
                        'field_class' => 'input-field',
                        'input_class' => 'validate',
                        'input_error_class' => 'invalid',
                        'is_valid' => isset($errors) && array_key_exists('last_name', $errors),
                        'input' => isset($input) && array_key_exists('last_name', $input) ? $input["last_name"] : "",
                    ]); ?>
                </div>
                <div class="col s6">
                    <?php $form->createField([
                        'label' => 'Email',
                        'placeholder' => 'Email',
                        'name' => 'email',
                        'type' => 'email',
                        'field_class' => 'input-field',
                        'input_class' => 'validate',
                        'input_error_class' => 'invalid',
                        'is_valid' => isset($errors) && array_key_exists('email', $errors),
                        'input' => isset($input) && array_key_exists('email', $input) ? $input["email"] : "",
                    ]); ?>
                </div>
                <div class="col s6">
                    <?php $form->createField([
                        'label' => 'Password',
                        'placeholder' => 'Password',
                        'name' => 'password',
                        'type' => 'password',
                        'field_class' => 'input-field',
                        'input_class' => 'validate',
                        'input_error_class' => 'invalid',
                        'is_valid' => isset($errors) && array_key_exists('password', $errors),
                        'input' => isset($input) && array_key_exists('password', $input) ? $input["password"] : "",
                    ]); ?>
                </div>
                <div class="col s6">
                    <?php $form->createField([
                        'label' => 'Confirm Password',
                        'placeholder' => 'Confirm Password',
                        'name' => 'confirm_password',
                        'type' => 'password',
                        'field_class' => 'input-field',
                        'input_class' => 'validate',
                        'input_error_class' => 'invalid',
                        'is_valid' => isset($errors) && array_key_exists('confirm_password', $errors),
                        'input' => isset($input) && array_key_exists('confirm_password', $input) ? $input["confirm_password"] : "",
                    ]); ?>
                </div>
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit">Register
                        <i class="material-icons right">send</i>
                    </button>
                </div>
                <?= $form::end(); ?>
            </div>
        </div>
    </div>
</main>