<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <input type="search" class="search-field"
            placeholder="<?php esc_attr_e ( 'Ключевое слово', 'nilelogistics' ) ?>"
            value="" name="s"
            title="<?php esc_attr_e( 'Ключевое слово', 'nilelogistics' ) ?>" required>
    </label>
    <input type="submit" class="search-submit" value="<?php esc_attr_e( 'Найти', 'nilelogistics' ) ?>" />
</form>
