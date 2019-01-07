<div class="col-auto">
    <h1>Results</h1>
</div>
<div class="w-100"></div>
<div class="col-auto">
    <? if(count($data) != 0) { ?>
    <table class="table">
        <thead>
        <tr>
            <th><input type="text" id="myInput0" onkeyup="myFunction(0)" placeholder="Search for UID.."></th>
            <th><input type="text" id="myInput1" onkeyup="myFunction(1)" placeholder="Search for names.."></th>
            <th><input type="text" id="myInput2" onkeyup="myFunction(2)" placeholder="Search for ages.."></th>
            <th><input type="text" id="myInput3" onkeyup="myFunction(3)" placeholder="Search for emails.."></th>
            <th><input type="text" id="myInput4" onkeyup="myFunction(4)" placeholder="Search for phones.."></th>
            <th>
                <select onchange="myFunction(5)" id="myInput5" name="gender">
                    <option value="&nbsp;male">Male</option>
                    <option value="female">Female</option>
                </select>
            </th>
        </tr>
        </thead>
    </table>

    <table id="myTable" class="table table-striped">
        <thead>
        <tr>
            <th scope="col" onclick="sortTable(0)">UID</th>
            <th scope="col" onclick="sortTable(1)">Name</th>
            <th scope="col" onclick="sortTable(2)">Age</th>
            <th scope="col" onclick="sortTable(3)">Email</th>
            <th scope="col" onclick="sortTable(4)">Phone</th>
            <th scope="col" onclick="sortTable(5)">Gender</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($data as $row) { ?>
        <tr>
            <td><?=$row['UID']?></td>
            <td><?=$row['Name']?></td>
            <td><?=$row['Age']?></td>
            <td><?=$row['Email']?></td>
            <td><?=$row['Phone']?></td>
            <? if ($row['Gender'] == 'male') { ?>
            <td>&nbsp;<?=$row['Gender']?></td>
            <? } else { ?>
            <td><?=$row['Gender']?></td>
            <? } ?>
        </tr>
        <? } ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="/export" role="button">Export to CSV</a>
    <? } else { ?>
    <div class="alert alert-primary" role="alert">
        No data!
    </div>
    <? } ?>
    <a class="btn btn-primary" href="/" role="button">Import data</a>
</div>
