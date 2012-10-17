<div class="l_content">

 <script>
    $(function() {
        var availableTags = [
<? foreach ($carBrands as $carBrand) { ?>
	            {
                value: "<? echo $carBrand->title;?>",
                label: "<? echo $carBrand->title;?>",
                path: "<? echo CHtml::normalizeUrl($carBrand->url());?>",
            },

<? } ?>
        ];
        $( "#tags" ).autocomplete({
            source: availableTags,
			select: function( event, ui ) {
				
				location.href = ui.item.path;
 
                return false;
            }
        });
    });
    </script>
<div class="b_content_listservices">
	<div class="ui-widget">
		<label class="b_content_listservices_header" for="tags">Введите марку машину: </label>
		<input id="tags" />
	</div>
	<? foreach ($models as $model) { ?>
		<div class="b_content_listservices_item">

			<? echo CHtml::link($model->title,$model->url());?>
		</div>
	<? } ?>
</div>

</div>