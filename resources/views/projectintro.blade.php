<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: auto;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #0000FF;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" style="margin-bottom: 40px;">
            <div class="content">
                <div class="title m-b-md text-primary"  style="margin-top: 40px;">
                   Job Portal
                </div>

                <div  style="margin-left: 40px; margin-right: 40px; margin-bottom: 50px; text-align: justify;" >
                    <p>In this competitive era, the education among the people is so increasing that the jobs for them are now decreasing. It becomes difficult to find the people who are intelligent enough to be hired. The work for the companies also increases to find the people who can fulfill their requirements. Thinking about these problems, one can think about the process which can handle this process and make the work less complex. So, this Online Job Portal system is developed in PHP using laravel framework as a solution for this problem.</p>
                    <p>This system is about recruiting for jobs and applying for jobs, it will check the eligibility of user and their skills. This system can be used for the placements providing to the unemployed who are seeking for a job placement. Job seeker logging into the system can be able to upload their information in the form of a CV. Visitors logging in may also access/search any information put up by job aspirants.</p>
                    <p>The main purpose of this system is to reduce paperwork and complication of job placements. The project has been planned to be having the view of distributed architecture, with centralized storage of the database. The application for the storage of the data has been planned. Using the constructs of Apache Server and all the user interfaces have been designed using the PHP Laravel technologies. The database connectivity is planned to use the “MySQL Connection” methodology. The standards of security and data protective mechanism have been given a big choice for proper usage. The application takes care of different modules and their associated reports, which are produced as per the applicable strategies and standards that are put forwarded by the administrative staff.</p>
                </div>

                <div class="links" style="margin: 50px;">
                        <a href="{{ route('login') }}">Go to Project</a>
                </div>
            </div>   
        </div>
    </body>
</html>
