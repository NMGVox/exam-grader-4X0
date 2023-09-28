While I wss attending university, I took a course that required two other students and I to create an exam grading web application.
Specifics:
-Professor should be able to log-in, create exams, see exam results for each student, and make manual changes to exam scores.
-Students should be able to log-in, take exams that are linked to them (through professor-ids), and view their exam scores once published by their professor.

I was in charge of the server-side code. Which involved moving data from the front-end to the database (and vice-versa) and developing a autp-grader that took a student's answers and then
graded them against an answer-bank (stored in the databse) specified by the professor. I also had to write a parser that graded open-ended coding questions for the Python syntax. The parser/grader subtracted points for inaccurate syntax and wrong output. I also

While the original site is inaccessible today, I still have the original code that I wrote in PHP to accomplish the above tasks. Check it out if you're interested!