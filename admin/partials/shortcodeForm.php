<form id="ajaxForm">
    <input name="action" type="hidden" value="realEstateForm" />      
    <table>
        <tr>
            <td> Tytuł:</td>               
            <td><input type="text" size="60" name="realEstateTitle" id="real_estate_title"/></td>              
        </tr>       
        <tr>
            <td> Cena:</td>
            <td><input type="text" size="60" name="realEstatePrice" id="real_estate_price"/></td>              
        </tr>
        <tr>
            <td> Metraż:</td>
            <td><input type="text" size="60" name="realEstateArea" id="real_estate_area"/></td>              
        </tr>
        <tr>
            <td> Adres:</td>
            <td><input type="text" size="60" name="realEstateAddress" id="real_estate_address"/></td>              
        </tr>
        <tr>
            <td> Rodzaj:</td>
                <td>
                    <select name="realEstateType" form="ajaxForm" type="text" id="real_estate_type">
                        <option value="">Wybierz rodzaj nieruchomości</option>
                        <?php
                        $terms = get_terms('houses');
                        foreach($terms as $term) {
                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                        }                            
                        ?>
                    </select>
                </td>
        </tr>            
        <tr>
            <td> Opis:</td>
            <td><textarea name="realEstateDescription" form="ajaxForm" id="real_estate_description"></textarea></td>
        </tr>
        <tr>
            <td> Zdjęcia:</td>
            <td>
                <input name="realEstatePicture" id="realEstatePicture" type="hidden" value="" />
                <div id="fileUploader">Upload</div>
            </td>
        </tr>            
    </table>
    <input id="res" class="button" type="submit" name="res" value="Wyślij"/>
</form>