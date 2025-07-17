import React, { useState } from 'react';
import { Sidebar } from './components/Sidebar';
import { Navbar } from './components/Navbar';
import { DashboardCards } from './components/DashboardCards';
import { RecentOrders } from './components/RecentOrders';
import { SalesChart } from './components/SalesChart';
import { TopProducts } from './components/TopProducts';
import { OrdersPage } from './components/pages/OrdersPage';
import { CustomersPage } from './components/pages/CustomersPage';
import { ProductsPage } from './components/pages/ProductsPage';
import { AnalyticsPage } from './components/pages/AnalyticsPage';
import { PaymentsPage } from './components/pages/PaymentsPage';
import { MessagesPage } from './components/pages/MessagesPage';
import { NotificationsPage } from './components/pages/NotificationsPage';
import { SettingsPage } from './components/pages/SettingsPage';

function App() {
  const [activeSection, setActiveSection] = useState('dashboard');

  const renderContent = () => {
    switch (activeSection) {
      case 'dashboard':
        return (
          <div className="space-y-6">
            <div>
              <h1 className="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
              <p className="text-gray-600">Welcome back! Here's what's happening with your restaurant today.</p>
            </div>
            
            <DashboardCards />
            
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
              <SalesChart />
              <TopProducts />
            </div>
            
            <RecentOrders />
          </div>
        );
      
      case 'orders':
        return (
          <OrdersPage />
        );
      
      case 'customers':
        return (
          <CustomersPage />
        );
      
      case 'products':
        return (
          <ProductsPage />
        );
      
      case 'analytics':
        return (
          <AnalyticsPage />
        );
      
      case 'payments':
        return (
          <PaymentsPage />
        );
      
      case 'messages':
        return (
          <MessagesPage />
        );
      
      case 'notifications':
        return (
          <NotificationsPage />
        );
      
      case 'settings':
        return (
          <SettingsPage />
        );
      
      default:
        return (
          <div className="bg-white rounded-xl border border-gray-200 p-8 text-center">
            <p className="text-gray-500">Select a section from the sidebar.</p>
          </div>
        );
    }
  };

  return (
    <div className="flex h-screen bg-gray-50">
      <Sidebar activeSection={activeSection} setActiveSection={setActiveSection} />
      
      <div className="flex-1 flex flex-col overflow-hidden">
        <Navbar />
        
        <main className="flex-1 overflow-y-auto p-6">
          {renderContent()}
        </main>
      </div>
    </div>
  );
}

export default App;