# LaptopARAS - Gaming Laptop Selection Decision Support System (DSS)

A Decision Support System (DSS) application built with **CodeIgniter 4** that implements the **Additive Ratio Assessment (ARAS)** method to help recommend the best gaming laptop choices objectively.

## Main Features
1. **Flexible Independent Experimentation**: Users can dynamically modify criteria types (as either *Benefit* or *Cost*) according to their needs without being locked by the system.
2. **Real-Time ARAS Algorithm Calculation**: The system automatically computes the decision matrix (X), determines the optimal alternative (A0), normalized matrix (R), utility degree (Ki), and final ranking instantly.
3. **Structured Visual Guide**: Provides a reference guide for the ARAS method across 8 steps, visualized with a modern design for educational purposes.
4. **Modern Interface (Tailwind CSS)**: Uses a smooth, responsive design with a neutral color palette to prevent bias when evaluating specification weights.

## Technologies Used
- **Backend Framework**: CodeIgniter 4 (PHP 8+)
- **Frontend / Styling**: Tailwind CSS
- **Dynamic Logic**: Vanilla JavaScript (ES6)
- **DSS Method**: Additive Ratio Assessment (ARAS)

## Application Execution Guide
To view the installation and local execution steps on your computer using **XAMPP**, please refer to the [`Running.md`](./Running.md) document located in the root folder of this project.

## Core System Files
- `app/Controllers/EksperimenController.php`: Bridge handling requests from the web page to the method calculator.
- `app/Libraries/ArasLibraries.php`: Main engine (calculator) containing the complete ARAS method algorithm formulas.
- `app/Views/eksperimen/index.php`: User interface layout for the Independent Experimentation feature.

## License
This project is open-source and primarily designed for research/educational purposes regarding the implementation of advanced decision support system methods.
