<?php echo $this->Html->css('/css/themes/base/minified/jquery-ui.min');?>
<?php echo $this->Html->script('/js/jquery-1.9.1.min');?>
<?php echo $this->Html->script('/js/jquery-ui-1.10.3.custom.min');?>
<script type="text/javascript">
jQuery( function() {
    jQuery('#dialog').dialog( {
        autoOpen: false,
    } );
    jQuery('#divDialog').click( function() {
        jQuery('#dialog').dialog( 'open' );
        return false;
    } );
} );
// $(document).ready(function() {
    // $("#divDialog").click(function() {

        // $.ajax({
            // url : "/ajax/dialog",
            // type : 'post',
            // data : 'lat=1234',
            // dataType: 'html',
            // success: function(response) {
                // alert(response);
                // $("#dialog").show();
                // Check jquery loaded
                // if(jQuery.ui) {
                    // Fill dialog with form
                    // $("#dialog").html(response).show();

                    // Show dialog
                    // $("#dialog").dialog("open");
                // }
            // }
        // });
    // });
    // return false;
// });

// $("#disp").dialog({
    // autoOpen: false,
    // buttons: {
        // 'close': function(){
            // $(this).dialog('close');
            // $("#disp").children().remove();
        // }
    // },
    // open: function(){
        // $("#disp").load($(this).dialog("option", "url"), null, function() {
            // $("#loading").hide();
        // });
    // }
// });
// $(document).ready(function() {
    // $("#divDialog").click(function(){
        // $("#loading").show();
        // $("#disp").dialog("option", "url", "/ajax/dialog");
        // $("#disp").dialog('open');
        // return false;
    // });
// });

// $(document).ready(function() {
// 　$("#divDialog").click(function() {
// 　　$( "#dialog" ).dialog({
// 　　　modal: true,
// 　　　buttons: {
// 　　　　"OK": function(){
// 　　　　$(this).dialog('close');
// 　　　　}
// 　　　}
// 　　});
// 　});
// });

</script>
<?php echo $this->element('Ajax/dialog'); ?>
<div class="stations index" id="latlonval">
    <h2><?php echo __('Stations'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('lat'); ?></th>
            <th><?php echo $this->Paginator->sort('lng'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($stations as $station): ?>
    <tr>
        <td><?php echo h($station['Station']['id']); ?>&nbsp;</td>
        <td><?php echo h($station['Station']['name']); ?>&nbsp;</td>
        <td><?php echo h($station['Station']['lat']); ?>&nbsp;</td>
        <td><?php echo h($station['Station']['lng']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('View'), array('action' => 'view', $station['Station']['id'])); ?>
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $station['Station']['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $station['Station']['id']), null, __('Are you sure you want to delete # %s?', $station['Station']['id'])); ?>
        </td>
    </tr>
<?php endforeach; ?>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>    </p>
    <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('өмнөх'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('дараах') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Station'), array('action' => 'add')); ?></li>
        <li><a href="javascript:void(0)" id="divDialog">Dialog</a></li>
    </ul>
</div>