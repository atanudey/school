<link rel="stylesheet" type="text/css" href="<?= site_url('report/save_style') ?>" />


<div class="pdf">
    <h1>Lorem Ipsum</h1>
	<h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h2>
    <table id="example" class="table table-striped table-bordered attablePdf" cellspacing="0" width="100%">
        <thead>
            <tr>
               	<th align="left" class="th">Roll</th>			
                <th align="left" class="th">Name</th>
                <th align="left" class="th">Address</th>
                <th align="left" class="th">Class</th>
                <th align="left" class="th">Section</th>
                <th align="left" class="th">Present</th>
                <th align="left" class="th">Absent</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($report as $s): ?>	
            <?php if ($s['Type'] == "data") { ?>
                <tr>
                                
                    <td align="left" class="td"><?php echo $s['Roll']; ?></td>
                    <td align="left" class="td"><?php echo $s['Name']; ?></td>
                    <td align="left" class="td"><?php echo $s['Address']; ?></td>
                    <td align="left" class="td"><?php echo $s['Class']; ?></td>
                    <td align="left" class="td"><?php echo $s['Section']; ?></td>
                    <td align="left" class="td"><?php echo $s['Present']; ?></td>
                    <td align="left" class="td"><?php echo $s['Absent']; ?></td>
                </tr>
            <?php } else if ($s['Type'] == "header") { ?>
                <tr class="header info">
                    <td colspan="7" align="center" class="td info" style="background-color: #d9edf7; color: #333;"><strong><?php echo $s['Information']; ?></strong></td>
                </tr>            
            <?php
            } else {
            ?>
                <tr>
                    <td colspan="5" align="left" class="td" style="background-color:#f1f1f1;color:#333;"><strong><?php echo $s['Information']; ?></strong></td>
                    <td align="left" class="td" style="background-color:#f1f1f1; color:#333;"><strong><?php echo $s['Present']; ?></strong></td>
                    <td align="left" class="td" style="background-color:#f1f1f1; color:#333;"><strong><?php echo $s['Absent']; ?></strong></td>                
                </tr>
            <?php
            }
            ?>
                
        <?php endforeach; ?>
        </tbody> 
    </table>
	 
</div>