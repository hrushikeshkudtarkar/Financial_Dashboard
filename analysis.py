import pandas as pd
import matplotlib.pyplot as plt

data = pd.read_csv('finance_data.csv')

print(data.head())

total_revenue = data['revenue'].sum()
total_expenses = data['expenses'].sum()

print("Total Revenue:", total_revenue)
print("Total Expenses:", total_expenses)

monthly = data.groupby('month')['revenue'].sum()

monthly.plot(kind='bar')

plt.title("Monthly Revenue")

plt.show()