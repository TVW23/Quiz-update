/*
* Author: Hesselst
* Github: https://github.com/Hesselst
* Description: This class contains all the javascript functions for the quiz
*
*
*    o    |~~~|
*   /\_  _|   |
*   \__`[_    |
*   ][ \,/|___|
*/

class Quiz {

    static CONFIG = {

    }

    constructor() {
        this.pointSystem = new PointSystem();
        this.streaks = new Streaks();
        this.answeredCorrectly = false;
        this.currentAnswerSelected = null;
    }

    // This gets executed from the onClick() function on one of the answer buttons [ onclick="getQuizAnswer(this)" ]
    getQuizAnswer(button) {
        this.currentAnswerSelected = button.innerText;
    }

    startQuiz() {
        // Set up the quiz loop
    }
    // This gets executed from the onClick() function on one of the submit button
    submitAnswer() {
        if (this.currentAnswerSelected === null) {
            return "Please select an answer!";
        }

        this.answeredCorrectly = this.getQuizAnswerResult();

        if (this.answeredCorrectly === true) {
            // Calculate points and increment
            this.pointSystem.calculateCurrentPoints();
            this.pointSystem.incrementPoints();

            this.updateTotalPointsMeter();
        }

        // At last, set the current answer to null, because there will be a new question
        this.currentAnswerSelected = null;
    }

    // Function to get the answer from php
    getQuizAnswerResult() {
        var data = null;

        fetch("../app/Http/Controllers/Api/checkQuizAnswer.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams({
                // Send the answer
                answer: this.currentAnswerSelected,
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log("Response:", data);
            data = data['answer'];
        })
        .catch(error => {
            console.error("Error:", error);
        });

        return data;
    }

    updateTotalPointsMeter() {
        /*
        TODO: 
        - Add some nice animations if points are increased
        */

        totalPointsMeter = document.getElementById("point-meter");

        // Set the meter to the total points 
        totalPointsMeter.innerHTML = this.pointSystem.totalPoints;
    }

    // Execute this function if all questions have been answered
    sendQuizResults() {
        // Send the points to the desired php file, so the points can be stored into the db
        fetch("../app/Http/Controllers/Api/quizEnd.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams({
                quizEnded: "true",
                points: this.pointSystem.totalPoints
            })
        });

        // Reset all quiz values
        this.streaks.resetStreak();
        this.pointSystem.resetTotalPoints();
    }
}