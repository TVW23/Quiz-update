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

    // Config for magic numbers
    static CONFIG = {
        STREAK_INCREMENT_COUNT: 1,
        MIN_STREAK: 0,
    }

    constructor() {
        this.curStreak = 0;
    }

    increaseStreak() {
        this.curStreak += this.CONFIG.STREAK_INCREMENT_COUNT;
    }

    setStreak(obtainedPoints) {
        // Check if obtainedPoints is a number
        if (!Number.isInteger(obtainedPoints)) {
            return;
        }

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
        this.curStreak = this.CONFIG.MIN_STREAK;
    }

    getCurStreak() {
        return Number(this.curStreak);
    }
}