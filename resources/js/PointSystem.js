/*
* Author: Hesselst
* Github: https://github.com/Hesselst
* Description: This class contains all the functions for the point system that will be used in each quiz
*
*
*    o    |~~~|
*   /\_  _|   |
*   \__`[_    |
*   ][ \,/|___|
*/

class PointSystem {
    constructor() {
        this.startTime = 0;
        this.elapsedTime = 0;
        this.running = false;
        this.totalPoints = 0;
        this.MIN_POINTS = 500;
        this.MAX_POINTS = 1000;
        this.TIME_INCREMENT = 1;
        // Wait time in miliseconds for the timer
        this.WAIT_TIME = 1000;
    }

    async startTimer() {
        this.running = true;

        while (this.running) {
            // Increase the elapsed time
            this.elapsedTime += this.TIME_INCREMENT;

            // Wait for some time
            await new Promise(r => setTimeout(r, this.WAIT_TIME));
        }
    }

    stopTimer() {
        this.running = false;
    }

    resetTimer() {
        // Set the elapsed time to the start time
        this.elapsedTime = this.startTime;

        this.running = false;
    }

    getCurrentTime() {
        return this.elapsedTime;
    }

    getCurrentPoints() {
        // calculate the minus points
        var minusPoints = this.elapsedTime * 10 / 3 * 10;

        var curPoints = this.MAX_POINTS = minusPoints;

        return curPoints;
    }

    getTotalPoints() {
        return this.totalPoints;
    }
}