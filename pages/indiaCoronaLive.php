<!-- header  -->
<?php include_once '../inc/header.php'; ?>

<!-- /navbar  -->
<?php include_once '../inc/navbar.php'; ?>

<!-- latest updates from corona virus -->

<section id="updates" class="corana-updates">

    <div class="mb-5">
        <h1 class="text-capitalize text-center text-md-center">India live covid-19 latest updates</h1>
    </div>

    <div class="container">
        <table class=" table-striped  table-responsive  scroll-bar table table  table-bordered ">
            <thead>
                <tr class=" text-capitalize">
                    <th>lastupdatedtime</th>
                    <th>state</th>
                    <th>active</th>
                    <th>recovered</th>
                    <th> deaths</th>
                    <th> confirmed</th>
                    <th>state code </th>
                    <th>delta recovered </th>
                    <th>delta  deaths </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = json_decode(file_get_contents("https://api.covid19india.org/data.json "), true);

                foreach ($data['statewise'] as $key => $valueArray) {

                ?>
                    <tr>
                        <td> <?= $valueArray['lastupdatedtime'] ?> </td>
                        <td> <?= $valueArray['state'] ?> </td>
                        <td> <?= $valueArray['active'] ?> </td>
                        <td> <?= $valueArray['recovered'] ?> </td>
                        <td> <?= $valueArray['deaths'] ?> </td>
                        <td> <?= $valueArray['confirmed'] ?> </td>
                        <td> <?= $valueArray['statecode'] ?> </td>
                        <td> <?= $valueArray['deltarecovered'] ?> </td>
                        <td> <?= $valueArray['deltadeaths'] ?> </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>

</section>


<!-- /footer  -->
<?php include_once '../inc/footer.php'; ?>