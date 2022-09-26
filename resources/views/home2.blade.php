<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JKB Education Group</title>
    <link rel="stylesheet" href="./style2.css">
</head>

<body>
    <div>
        <h1>JKB Education Group & IT Services</h1>
        <section>
            <h3>Academic Cum Industrial Grooming</h3>
            <p>Check which college you will get...</p>
            <form action="/records_mu" method="GET">
                <!-- <select name='select-exam' class="form-select appearance-none
                                block
                                w-full
                                px-6
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
                    <option selected style="font-size:20px" id="exam">Select Exam</option>
                    <option value="JEE" style="font-size:20px">JEE Score</option>
                    <option value="MHT-CET" style="font-size:20px">CET Score</option>
                </select><br> -->

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
                    <option selected style="font-size:20px">Select Engineering Branch</option>
                    <option value="Computer Engineering" style="font-size:20px;">Computer Engineering</option>
                    <option value="IT Engineering" style="font-size:20px;">Information Technology</option>
                    <option value="EXTC Engineering" style="font-size:20px;">Electronics and Telecommunication Engg</option>
                    <option value="Electrical Engineering" style="font-size:20px;">Electrical Engineering</option>
                    <option value="Mechanical Engineering" style="font-size:20px;">Mechanical Engineering</option>
                    <option value="Mechatronics Engineering" style="font-size:20px;">Mechatronics Engineering</option>
                    <option value="Automobile Engineering" style="font-size:20px;">Automobile Engineering</option>
                    <option value="Instrumentation Engineering" style="font-size:20px;">Instrumentation Engineering</option>
                    <option value="Chemical Engineering" style="font-size:20px;">Chemical Engineering</option>
                    <option value="Biomedical Engineering" style="font-size:20px;">Biomedical Engineering</option>
                    <option value="Civil Engineering" style="font-size:20px;">Civil Engineering</option>
                    <option value="AI / ML Engineering" style="font-size:20px;">AI/ML Engineering</option>
                </select>
                <!-- <label for="score" class="label">Score</label>
                <input type="text" name="score" class="input"><br> -->
                <br>
                <button id="btn">Submit</button>
            </form>
        </section>
    </div>

    @if($records)
    <!-- <form action = '/excel'>
        <input type="submit" value="Download PDF">
    <form> -->
    <div class="recordContent">
        <table class="table-auto">
            <thead>
                <tr>
                    <th>Institute</th>
                    <!-- <th>Course</th> -->
                    <th>Location</th>
                    <th>GOPENS/GOPENH</th>
                    <th>GSCS</th>
                    <th>GSTS</th>
                    <th>GVJS</th>
                    <th>GNT1S</th>
                    <th>GNT2S</th>
                    <th>GNT3S</th>
                    <th>GOBCS</th>
                    <th>TFWS</th>
                    <th>EWS</th>
                    <th>MI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                <tr>
                    <td>{{ $record -> InstituteName }}</td>
                    <!-- <td>{{ $record -> CourseName }}</td> -->
                    <td>{{ $record -> Location }}</td>
                    <td>{{ $record -> GOPEN ?? '-' }}</td>
                    <td>{{ $record -> GSCS ?? '-' }}</td>
                    <td>{{ $record -> GSTS ?? '-' }}</td>
                    <td>{{ $record -> GVJS ?? '-' }}</td>
                    <td>{{ $record -> GNT1S ?? '-' }}</td>
                    <td>{{ $record -> GNT2S ?? '-' }}</td>
                    <td>{{ $record -> GNT3S ?? '-' }}</td>
                    <td>{{ $record -> GOBCS ?? '-' }}</td>
                    <td>{{ $record -> TFWS ?? '-' }}</td>
                    <td>{{ $record -> EWS ?? '-' }}</td>
                    <td>{{ $record -> MI ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endif

</body>

</html>