<?php include('author_header.php') ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="text-center text-secondary fw-bold">New Submitted Papers</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th width="30%">Paper Title</th>
                                    <th>Authors</th>
                                    <th>File</th>
                                    <th>Submission Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // select paper information
                                $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `author_id` = '$_SESSION[author_id]' AND `paper_status` = '1'";
                                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                $serial_no = 1;
                                while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                ?>
                                    <tr>
                                        <td><?php echo $serial_no; ?></td>
                                        <td><?php echo $row['paper_title'] ?></td>
                                        <td><?php echo $row['authors_name'] ?></td>
                                        <td><a href="document_for_manuscript/<?php echo $row['manuscript_pdf'] ?>"><?php echo $row['manuscript_pdf'] ?></a></td>
                                        <td><?php echo date('d-M-Y', strtotime($row['timestamps'])) ?></td>
                                        <?php
                                        if ($row['paper_status'] == 1) {
                                            if ($row['count'] == 1) {
                                        ?>
                                                <td class="text-secondary fw-bold"><?php echo "New Submission" ?></td>
                                            <?php
                                            } else {
                                            ?>
                                                <td class="text-secondary fw-bold"><?php echo "Re-Submission" ?></td>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                <?php
                                    $serial_no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('author_footer.php') ?>