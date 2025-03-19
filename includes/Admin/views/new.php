<div class="wrap">

    <h1 class="wp-heading-inline">New Address</h1>
    <?php var_dump($this->errors);?>

    <form method="post" action="">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label for="name"><?php _e('Name', 'wedevs-academy') ?></label>
                </th>
                <td>
                    <input type="text" name="name" id="name" class="regular-text" value="">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="address"><?php _e('Address', 'wedevs-academy') ?></label>
                </th>
                <td>
                    <textarea name="address" id="address" class="regular-text" value="" ></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="phone"><?php _e('Number', 'wedevs-academy') ?></label>
                </th>
                <td>
                    <input type="number" name="phone" id="phone" class="regular-text" value="">
                </td>
            </tr>
            </tbody>
        </table>
        <?php wp_nonce_field('new-address');?>
        <?php submit_button(__('Add Address', 'wedevs-academy'), 'primary', 'submit-address')?>
    </form>
</div>