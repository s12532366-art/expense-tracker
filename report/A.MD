# Individual Contribution Report - Student A

## 1. Role & Assigned Responsibilities
- **Assigned Role:** Team Lead, Frontend Developer & Git Admin
- **Contributed Files:**
  - `README.md`
  - `.gitignore`
  - `includes/header.php`
  - `includes/footer.php`
  - `public/assets/css/style.css`
  - `public/summary.php` (Co-developed after restructuring)

## 2. Team Restructuring Note
- Student C withdrew from the course/group during Phase 1.
- All database integration, scripting, and backend responsibilities were successfully redistributed and completed between Student A and Student D without impacting project functionality.

## 3. Merge Conflict Resolution (README.md)
- **Conflict Context:** Occurred during Phase 2 when updating the `README.md` file to document team roles. Both Student A and Student D edited the file simultaneously on their local branches.
- **Git Behavior:** Student A pushed their commit first to the remote `main` branch. When Student D attempted to pull and push, Git flagged a merge conflict inside `README.md` with standard markers (`<<<<<<< HEAD`, `=======`, `>>>>>>> main`).
- **Resolution Strategy:** As Git Admin, Student A collaborated with Student D to resolve the markers inside VS Code. We opted to retain both member entries under the `## Team Members` section, saved the file, and executed a clean merge commit (`git commit -m "Resolve merge conflict in README.md"`).

## 4. Git Revert & Practice
- **Uncommitted Changes:** Practiced discarding local uncommitted working directory changes via GitHub Desktop discard feature.
- **Remote Rollback:** Simulated a breaking bug rollback using `git revert <commit-hash>` to safely undo a pushed commit on the remote repository without altering commit history log.

## 5. Key Learnings & Technical Summary
- Mastered team version control management using GitHub Desktop and VS Code.
- Implemented modular PHP components and Bootstrap 5 responsive layouts.