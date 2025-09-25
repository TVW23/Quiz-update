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
        this.quizRunning = false;
    }

    // This gets executed from the onClick() function on one of the answer buttons [ onclick="getQuizAnswer(this)" ]
    getQuizAnswer(button) {
        if (!button) {
            this.currentAnswerSelected = null;
            console.log("getQuizAnswer: Button is null")
            return;
        }
        this.currentAnswerSelected = button.innerText;
    }

    startQuiz() {
        // Dummy number
        var totalQuestionsLeft = 10;

        // Set up the quiz loop
        while (totalQuestionsLeft > 0) {
            this.updateQuestion();
            totalQuestionsLeft--;
        }
    }

    updateQuestion() {

    }

    // This gets executed from the onClick() function on one of the submit button
    submitAnswer() {
        if (this.currentAnswerSelected === null) {
            console.log("submitAnswer: currentAnswerSelected is null")
            return;
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

        fetch("/api/check-quiz-answer", {
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

    testingQuiz() {
        console.log("Dit is een test");
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
        fetch("/api/quiz-end", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams({
                points: this.pointSystem.totalPoints
            })
        });

        // Reset all quiz values
        this.streaks.resetStreak();
        this.pointSystem.resetTotalPoints();
    }
}