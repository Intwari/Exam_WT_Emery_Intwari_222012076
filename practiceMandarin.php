<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice Vocabulary - Language Learner</title>
    <style>
        body {
            background: url("download\ \(4\).jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            overflow: hidden;
        }

        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo {
            margin-left: 20px;
            font-size: 24px;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        header nav ul li {
            margin-right: 20px;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        /* Position the button in the top-right corner */
        .return-home-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .return-home-btn:hover {
            background-color: #555; /* Change color on hover */
        }

        #practice {
            padding: 20px 20px 40px;
            text-align: center;
            color: white;
        }

        #practice h2, #practice h3 {
            margin-top: 0;
        }

        #practice img {
            max-width: 300px;
            margin: 20px 0;
        }

        .btn-option {
            width: 130px;
            height: 40px;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.4);
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: .3s ease;
            margin: 10px;
        }

        .btn-option:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .btn-next {
            width: 130px;
            height: 40px;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.7);
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: .3s ease;
            display: none;
            margin-top: 20px;
        }

        .btn-next:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        #next-button {
            margin-top: 20px;
            text-align: center;
            padding-left: 45%;
        }

        .completion-message {
            color: white;
            text-align: center;
            display: none;
        }

        .options-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }
    </style>
</head>
<body>
<li><a href="home.php" class="return-home-btn" style="text-decoration: none;">Back Home</a></li>
    <section id="practice">
        <h2>Practice Mandarin Vocabulary</h2>
        <h3>Choose the correct answer</h3>
        <img src="image/house.jpg" alt="House" id="vocab-image">
        <div class="options-container" id="options-container">
            <button class="btn-option" onclick="checkAnswer('house')">Car</button>
            <button class="btn-option" onclick="checkAnswer('car')">Cow</button>
            <button class="btn-option" onclick="checkAnswer('dog')">Horse</button>
            <button class="btn-option" onclick="checkAnswer('bike')">House</button>
        </div>
        <div id="feedback"></div>
        <div id="next-button">
            <button class="btn-next" onclick="nextExercise()">Next</button>
        </div>
        <div class="completion-message" id="completion-message">
            Great job! You've completed all exercises.
        </div>
    </section>

    <script>
       const exercises = [
    {
        image: 'image/apple.jpg',
        options: ['Pingguo', 'Xiangjiao', 'Chengzi', 'Putao'],
        correct: 'Pingguo' // Apple
    },
    {
        image: 'image/shirt.jpg',
        options: ['Kuzi', 'Chenshan', 'Maozi', 'Xiezi'],
        correct: 'Chenshan' // Shirt
    },
    {
        image: 'image/banana.jpg',
        options: ['Pingguo', 'Caomei', 'Xiangjiao', 'Li'],
        correct: 'Xiangjiao' // Banana
    },
    {
        image: 'image/pants.jpg',
        options: ['Qunzi', 'Chenshan', 'Kuzi', 'Xiezi'],
        correct: 'Kuzi' // Pants
    },
    {
        image: 'image/orange.jpg',
        options: ['Xigua', 'Chengzi', 'Yingtao', 'Putao'],
        correct: 'Chengzi' // Orange
    },
    {
        image: 'image/hat.jpg',
        options: ['Shoutao', 'Weijin', 'Maozi', 'Kuzi'],
        correct: 'Maozi' // Hat
    },
];



        let currentExercise = 0;

        function loadExercise() {
            const exercise = exercises[currentExercise];
            document.getElementById('vocab-image').src = exercise.image;
            document.getElementById('vocab-image').alt = exercise.correct;
            const optionsContainer = document.getElementById('options-container');
            optionsContainer.innerHTML = '';
            exercise.options.forEach(option => {
                const button = document.createElement('button');
                button.className = 'btn-option';
                button.innerText = option;
                button.onclick = () => checkAnswer(option);
                optionsContainer.appendChild(button);
            });
        }

        function checkAnswer(answer) {
            const exercise = exercises[currentExercise];
            const feedback = document.getElementById('feedback');
            if (answer === exercise.correct) {
                feedback.innerText = 'Correct!';
                feedback.style.color = 'green';
            } else {
                feedback.innerText = 'Incorrect. Try again!';
                feedback.style.color = 'red';
            }
            document.querySelector('.btn-next').style.display = 'block';
        }

        function nextExercise() {
            currentExercise++;
            if (currentExercise < exercises.length) {
                loadExercise();
                document.getElementById('feedback').innerText = '';
                document.querySelector('.btn-next').style.display = 'none';
            } else {
                document.getElementById('practice').style.display = 'none';
                document.getElementById('completion-message').style.display = 'block';
            }
        }

        window.onload = loadExercise;
    </script>
</body>
</html>
