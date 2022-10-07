<x-layout>

    <div>
        <h1>JKB Education Group & IT Services</h1>
        <iframe id="video" src="https://www.youtube.com/embed/MeBWQVu4GL8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        @guest
        <br/>
        <button id="btn"><a href='#register'>Predict My College</a></button>
        @endguest

        <div id="register">
        <x-register>
        </x-register>
        </div>
        

        @auth
        <h4>Welcome {{ auth() -> user() -> name }}</h4>
        <section>
            <h3>Academic Cum Industrial Grooming</h3>
            <p>Check which college you will get...</p>
            <form action="/records_mu" method="GET">
                <select name='select-exam' class="temp form-select appearance-none
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
                    <option selected style="font-size:20px" id="exam">Select Exam (JEE / MHT-CET)</option>
                    <option value="JEE" style="font-size:20px">JEE</option>
                    <option value="MHT-CET" style="font-size:20px">CET</option>
                </select><br>

                <select name="select-branch" class="temp form-select appearance-none
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
                    <option value="Computer Science Engineering" style="font-size:20px;">Computer Science Engineering</option>
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

                <br />

                <select name="select-category" class="temp form-select appearance-none
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
                    <option selected style="font-size:20px">Select Category</option>
                    <option value="GOPEN" style="font-size:20px;">GOPENS / GOEPNH</option>
                    <option value="GSCS" style="font-size:20px;">GSCS / GSCH</option>
                    <option value="GSTS" style="font-size:20px;">GSTS / GSTH</option>
                    <option value="GVJS" style="font-size:20px;">GVJS / GVJH</option>
                    <option value="GNT1S" style="font-size:20px;">GNT1S / GNT1H</option>
                    <option value="GNT2S" style="font-size:20px;">GNT2S / GNT2H</option>
                    <option value="GNT3S" style="font-size:20px;">GNT3S / GNT3H</option>
                    <option value="GOBCS" style="font-size:20px;">GOBCS / GOBCH</option>
                    <option value="TFWS" style="font-size:20px;">TFWS</option>
                    <option value="EWS" style="font-size:20px;">EWS</option>
                    <option value="MI" style="font-size:20px;">MI</option>
                </select>

                <br />

                <!-- <label for="score" class="label" >Score</label> -->
                <input type="text" name="score" class="temp2 input" placeholder="Score"><br>
                <br>
                @auth
                <button id="btn">Submit</button>
                @endauth
            </form>
        </section>
        @endauth
    </div>

    @if($records)
    <!-- <form action = '/excel'>
        <input type="submit" value="Download PDF">
    <form> -->
    <div class="recordContent">
        <table class="table-fixed">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Institute</th>
                    <th>Course</th>
                    <th>Location</th>
                    <th>Category Percentile</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                <tr>
                    <td>{{$loop -> index + 1}}</td>
                    <td>{{ $record -> InstituteName }}</td>
                    <td>{{ $record -> CourseName }}</td>
                    <td>{{ $record -> Location }}</td>
                    <td>{{ $record -> Category ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endif

    @if($recordsAI)
    <div class="recordContent">
        <table class="table-fixed">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Institute</th>
                    <th>CourseName</th>
                    <th>Exam(JEE/MHT-CET)</th>
                    <th>Percentile</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recordsAI as $record)
                <tr>
                    <td>{{$loop -> index + 1}}</td>
                    <td>{{ $record -> Institute }}</td>
                    <td>{{ $record -> CourseName }}</td>
                    <td>{{ $record -> Exam }}</td>
                    <td>{{ $record -> Percentile ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endif
</x-layout>