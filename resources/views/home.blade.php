<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JKB Education Group</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div>
        <h1>JKB Education Group & IT Services</h1>
        <h3>Academic Cum Industrial Grooming</h3>
        <p>College Admission Exam Predictor</p>
    </div>
    <form action="/records" method="GET">
        <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <select name='select-exam' class="form-select appearance-none
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                    <option selected>Select Exam</option>
                    <option value="JEE">JEE Score</option>
                    <option value="MHT-CET">CET Score</option>
                </select>
            </div>
            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <select name="select-branch" class="form-select appearance-none
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option selected>Select Engineering Branch</option>
                        @foreach($branches as $branch)
                        <option value="{{ $branch -> branch_name }}">{{ $branch -> branch_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <label for="jee-score" class="label">Score</label>
        <input type="text" name="jee-score" class="input"><br>
        <button id="btn">Submit</button>
    </form>

    @if($records)
    <div class="record-content">
        <table class="table-auto">
            <thead>
                <tr>
                    <th>Institute</th>
                    <th>Merit Score</th>
                    <th>Percentile</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                <tr>
                    <td>{{ $record -> Institute }}</td>
                    <td>{{ $record -> MeritScore }}</td>
                    <td>{{ $record -> Percentile }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endif

</body>

</html>

<?php

if (isset($_POST['submit'])) {
}

?>