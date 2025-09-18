/*
* Author: Hesselst
* Github: https://github.com/Hesselst
* Description: This class contains all the functions for the streak system, which will be used in each quiz
*
*
*    o    |~~~|
*   /\_  _|   |
*   \__`[_    |
*   ][ \,/|___|
*/

class Streaks {
    constructor() {
        this.curStreak = 0;
        this.STREAK_INCREMENT_COUNT = 1;
        this.MIN_STREAK = 0;
    }

    increaseStreak() {
        this.curStreak += this.STREAK_INCREMENT_COUNT;
    }

    setStreak(obtainedPoints) {
        // Check if the user has gained any points 
        if (obtainedPoints === 0) {
            // User has not gained any points, so the streak is set to 0
            this.resetStreak();
        } else {
            // User has gained points, so we increase the streak
            this.increaseStreak();
        }
    }

    resetStreak() {
        this.curStreak = this.MIN_STREAK;
    }

    getCurStreak() {
        return this.curStreak;
    }
}