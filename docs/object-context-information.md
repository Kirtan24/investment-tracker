# Object–Context–Information Mapping – Investment Tracker

This document describes the **core concepts** of the _Investment Tracker_ project in terms of **Objects**, **Contexts**, and the **Information** relevant to each context. This breakdown aligns with the principles of Software Design and Testing and provides a conceptual understanding of the domain model of the system.

---

## Object: User

### Context:
The User is the central entity who interacts with the system. They can register, log in, manage their own investments, and access their personal dashboard. Each user’s data and actions are isolated and private.

### Information:
- Full Name
- Email Address
- Password (securely hashed)
- Unique User ID
- Timestamps of account creation and login activity
- Relationships with investments (has-many)

---

## Object: Investment

### Context:
Investment represents a general concept that encapsulates any form of asset a user wishes to track. It serves as a base abstraction for specific investment types like Fixed Deposits, Property, and Stock. It is never used directly but provides a unified interface for handling all investment-related functionality.

### Information:
- Investment Type (e.g., Fixed Deposit, Property, Stock)
- Amount Invested
- Investment Date
- Description or Notes
- Associated User ID
- Status (active, matured, sold)

---

## Object: Fixed Deposit

### Context:
Fixed Deposit is a type of investment where a user deposits a sum of money for a fixed tenure and earns interest. The system allows users to input details, track duration, and calculate maturity values.

### Information:
- Principal Amount
- Interest Rate (%)
- Start Date
- Maturity Date
- Calculated Maturity Value
- Duration in Months/Years

---

## Object: Property

### Context:
Property represents real estate investments owned by the user. It can be a residential, commercial, or land-based property. The system enables users to track appreciation/depreciation and current value.

### Information:
- Property Type (e.g., House, Land, Commercial)
- Location or Address
- Purchase Date
- Purchase Price
- Current Market Value
- Description

---

## Object: Stock

### Context:
Stock represents equity investments. Users can input the company name, number of shares purchased, and the purchase price. The system calculates the total value based on the inputs.

### Information:
- Company Name
- Quantity of Shares
- Purchase Price per Share
- Total Investment Value
- Purchase Date
- Notes or Tags (optional)

---

## Object: Dashboard

### Context:
The dashboard is the personalized homepage shown to users after logging in. It summarizes all investments across categories and provides high-level insights to help the user understand their portfolio.

### Information:
- Total Amount Invested
- Percentage Distribution by Type (FD, Property, Stock)
- Recent Investment Activity
- Visual Charts and Summary Cards
- Date of last update

---

## Object: Investment Form

### Context:
The investment form is used when a user wants to add a new investment or edit an existing one. It adapts based on the selected type and ensures all required fields are validated.

### Information:
- Investment Type Selector
- Input Fields for relevant attributes (e.g., amount, rate, dates)
- Form Validation Errors
- Pre-filled data (for editing)

---

## Object: Investment Listing

### Context:
This is the page where users can view a complete list of all their investments. It offers actions like edit, delete, and filter. Each row represents one investment instance.

### Information:
- Serial Number or ID
- Investment Type
- Amount
- Date of Investment
- Action Buttons (Edit/Delete)
- Summary or Label (e.g., "FD - ₹10,000 for 1 year")

---

## Object: Investment Summary

### Context:
Displayed as part of the dashboard or detailed views, the investment summary gives categorized breakdowns and helps the user understand portfolio distribution.

### Information:
- Total Investment Value
- Count of Investments by Type
- Value per Category
- Graph Data for Pie/Bar Chart (optional)
- Key Highlights or Recommendations (optional)

---
