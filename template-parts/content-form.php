<form id="your-form-id" data-ajax="fetchapidata">
    <label for="name-field">Name:</label>
    <input type="text" id="name-field" data-ajax_input name="name" required>
    
    <label for="surname-field">Surname:</label>
    <input type="text" id="surname-field" data-ajax_input name="surname" required>

    <label for="gender-field">Gender</label>
    <select data-ajax_input name="gender" id="gender-field">
        <option value="female">Female</option>
        <option value="male">Male</option>
    </select>
    
    <input data-ajax_input type="checkbox" name="allow" id="agree-field" value="1" checked>
    <input data-ajax_input type="radio" name="race" id="race-black">
    <input data-ajax_input type="radio" name="race" id="race-colored">
    <input data-ajax_input type="radio" name="race" id="race-white">


    <input type="hidden" data-ajax_input name="ajax_nonce" value="<?= wp_create_nonce("ajax_nonce"); ?>">

    <input type="submit" value="Submit">
</form>
