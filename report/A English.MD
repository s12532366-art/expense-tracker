Individual Project Report
Student Name:  Tayseer AL shami 

Project Title: Expense Tracker Web Application

1. Environment Configuration & Database:

.gitignore: Prevents the local environment configuration file config.php from being committed to protect database credentials.

config.example.php: A committed placeholder template used as a base configuration when cloning the repository.

config.php: The actual local database connection file configured for my WAMP server environment.

database/schema.sql: The SQL database initialization script containing the expense_tracker database, categories table, and expenses table definitions.

Architecture & Layout Components:

includes/db.php: Database connection handler utilizing PHP PDO with exception handling.

includes/header.php: Navigation bar header component including Bootstrap 5 stylesheet imports.

includes/footer.php: Page footer component including JavaScript library imports.

Application Pages & Assets:

public/index.php: Main dashboard listing all recorded expenses ordered chronologically with automatic grand total calculation.

public/add_expense.php: Expense creation form with server-side PHP validation.

public/summary.php: Expense distribution summary page calculating spending category percentages visualized through Bootstrap progress bars.

public/assets/css/style.css: Custom CSS styling for card layouts and responsive container spacing.

public/assets/js/main.js: Client-side form validation before submitting data to the server.

README.md: Complete project setup guide, execution instructions, and role attribution documentation.

2. Merge Conflict Resolution
What Appeared: To practically demonstrate the required merge conflict resolution skills independently, I created a secondary local git branch and introduced conflicting modifications on the same lines inside README.md. Upon attempting a merge, Git inserted standard conflict markers:

<<<<<<< HEAD (Current changes), ======= (Separator), and >>>>>>> (Incoming branch changes).

Decision & Rationale: I decided to manually combine both sets of documentation rather than discarding either edit to ensure complete setup instructions and repository information remained intact in the final release.

Resolution Process: I opened README.md in VS Code, manually cleared all conflict symbols (<<<<<<<, =======, >>>>>>>), integrated both text blocks cleanly, saved the file, and committed a dedicated merge commit (Merge commit).

(📸 Note: Please attach a screenshot of the conflict markers inside VS Code here).

3. Git Revert & Undo Operations
Differences & Usage Cases:

git checkout / Discard: Reverts uncommitted local changes in specific working directory files. Used to quickly discard temporary code experiments before making a commit.

git reset: Moves the local repository history backward to uncommit local changes that have not been pushed to GitHub yet.

git revert: Reverses a commit that has already been pushed to GitHub (Remote) by creating a brand-new inverse commit. It safely cancels the unwanted bug without deleting or altering past repository commit history, making it the standard safe practice for production repositories.

Practical Application: I intentionally introduced a syntax error in public/index.php and pushed it to GitHub. I then executed git revert <commit-hash> via the terminal to generate an inverse commit, successfully restoring the application functionality while preserving complete commit log transparency.

(📸 Note: Please attach a screenshot of your GitHub Desktop Commit History showing the Revert commit here).

4. Main Teamwork Challenge & Solution
Challenge: The most critical challenge was the unexpected withdrawal of my teammates, which forced me to take full ownership of all application tiers (frontend design, backend logic, PDO database integration, and Git commit history logging) as a solo developer within a tight deadline.

Solution: I managed my time by breaking down the project into small sequential micro-tasks, maintained a consistent Git history using descriptive English commit messages, and successfully implemented secure PDO queries with Bootstrap styling to deliver a fully functional project meeting all assignment criteria.