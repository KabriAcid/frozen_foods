import React, { useState } from 'react';
import { Bell, Settings, Check, X, Clock, AlertTriangle, Info, CheckCircle } from 'lucide-react';

interface Notification {
  id: string;
  type: 'order' | 'payment' | 'system' | 'customer' | 'inventory';
  title: string;
  message: string;
  time: string;
  read: boolean;
  priority: 'high' | 'medium' | 'low';
  actionRequired: boolean;
}

const notifications: Notification[] = [
  {
    id: 'NOTIF-001',
    type: 'order',
    title: 'New Order Received',
    message: 'Order #ORD-156 from John Doe for $45.99',
    time: '2 minutes ago',
    read: false,
    priority: 'high',
    actionRequired: true
  },
  {
    id: 'NOTIF-002',
    type: 'payment',
    title: 'Payment Failed',
    message: 'Payment for order #ORD-155 failed. Customer needs to update payment method.',
    time: '15 minutes ago',
    read: false,
    priority: 'high',
    actionRequired: true
  },
  {
    id: 'NOTIF-003',
    type: 'inventory',
    title: 'Low Stock Alert',
    message: 'Grilled Chicken Bowl is running low (5 units remaining)',
    time: '1 hour ago',
    read: false,
    priority: 'medium',
    actionRequired: true
  },
  {
    id: 'NOTIF-004',
    type: 'customer',
    title: 'New Customer Review',
    message: 'Jane Smith left a 5-star review for Mediterranean Pasta',
    time: '2 hours ago',
    read: true,
    priority: 'low',
    actionRequired: false
  },
  {
    id: 'NOTIF-005',
    type: 'system',
    title: 'System Maintenance',
    message: 'Scheduled maintenance will occur tonight from 2:00 AM to 4:00 AM',
    time: '3 hours ago',
    read: true,
    priority: 'medium',
    actionRequired: false
  },
  {
    id: 'NOTIF-006',
    type: 'order',
    title: 'Order Completed',
    message: 'Order #ORD-154 has been successfully delivered to Mike Johnson',
    time: '4 hours ago',
    read: true,
    priority: 'low',
    actionRequired: false
  }
];

function getNotificationIcon(type: Notification['type']) {
  switch (type) {
    case 'order':
      return <Bell className="w-5 h-5 text-blue-600" />;
    case 'payment':
      return <AlertTriangle className="w-5 h-5 text-red-600" />;
    case 'system':
      return <Settings className="w-5 h-5 text-gray-600" />;
    case 'customer':
      return <Info className="w-5 h-5 text-green-600" />;
    case 'inventory':
      return <AlertTriangle className="w-5 h-5 text-orange-600" />;
    default:
      return <Bell className="w-5 h-5 text-gray-600" />;
  }
}

function getPriorityColor(priority: Notification['priority']) {
  switch (priority) {
    case 'high':
      return 'border-l-red-500';
    case 'medium':
      return 'border-l-yellow-500';
    case 'low':
      return 'border-l-green-500';
    default:
      return 'border-l-gray-500';
  }
}

export function NotificationsPage() {
  const [filter, setFilter] = useState<string>('all');
  const [notificationList, setNotificationList] = useState(notifications);

  const filteredNotifications = filter === 'all' 
    ? notificationList 
    : notificationList.filter(notif => notif.type === filter);

  const unreadCount = notificationList.filter(notif => !notif.read).length;
  const actionRequiredCount = notificationList.filter(notif => notif.actionRequired && !notif.read).length;

  const markAsRead = (id: string) => {
    setNotificationList(prev => 
      prev.map(notif => 
        notif.id === id ? { ...notif, read: true } : notif
      )
    );
  };

  const markAllAsRead = () => {
    setNotificationList(prev => 
      prev.map(notif => ({ ...notif, read: true }))
    );
  };

  const deleteNotification = (id: string) => {
    setNotificationList(prev => prev.filter(notif => notif.id !== id));
  };

  return (
    <div className="space-y-6">
      {/* Header */}
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-2xl font-bold text-gray-900">Notifications</h1>
          <p className="text-gray-600">Stay updated with system alerts and important updates</p>
        </div>
        <div className="flex items-center space-x-3">
          <button
            onClick={markAllAsRead}
            className="px-4 py-2 text-blue-600 hover:text-blue-700 font-medium text-sm"
          >
            Mark all as read
          </button>
          <button className="p-2 text-gray-400 hover:text-gray-600 transition-colors">
            <Settings className="w-5 h-5" />
          </button>
        </div>
      </div>

      {/* Stats Cards */}
      <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Total Notifications</p>
              <p className="text-2xl font-bold text-gray-900">{notificationList.length}</p>
            </div>
            <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
              <Bell className="w-6 h-6 text-blue-600" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Unread</p>
              <p className="text-2xl font-bold text-orange-600">{unreadCount}</p>
            </div>
            <div className="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
              <Clock className="w-6 h-6 text-orange-600" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Action Required</p>
              <p className="text-2xl font-bold text-red-600">{actionRequiredCount}</p>
            </div>
            <div className="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
              <AlertTriangle className="w-6 h-6 text-red-600" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Completed</p>
              <p className="text-2xl font-bold text-green-600">{notificationList.length - unreadCount}</p>
            </div>
            <div className="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
              <CheckCircle className="w-6 h-6 text-green-600" />
            </div>
          </div>
        </div>
      </div>

      {/* Filters */}
      <div className="bg-white rounded-xl border border-gray-200 p-6">
        <div className="flex flex-wrap gap-2">
          <button
            onClick={() => setFilter('all')}
            className={`px-4 py-2 rounded-lg text-sm font-medium transition-colors ${
              filter === 'all' 
                ? 'bg-blue-600 text-white' 
                : 'bg-gray-100 text-gray-600 hover:bg-gray-200'
            }`}
          >
            All ({notificationList.length})
          </button>
          <button
            onClick={() => setFilter('order')}
            className={`px-4 py-2 rounded-lg text-sm font-medium transition-colors ${
              filter === 'order' 
                ? 'bg-blue-600 text-white' 
                : 'bg-gray-100 text-gray-600 hover:bg-gray-200'
            }`}
          >
            Orders ({notificationList.filter(n => n.type === 'order').length})
          </button>
          <button
            onClick={() => setFilter('payment')}
            className={`px-4 py-2 rounded-lg text-sm font-medium transition-colors ${
              filter === 'payment' 
                ? 'bg-blue-600 text-white' 
                : 'bg-gray-100 text-gray-600 hover:bg-gray-200'
            }`}
          >
            Payments ({notificationList.filter(n => n.type === 'payment').length})
          </button>
          <button
            onClick={() => setFilter('inventory')}
            className={`px-4 py-2 rounded-lg text-sm font-medium transition-colors ${
              filter === 'inventory' 
                ? 'bg-blue-600 text-white' 
                : 'bg-gray-100 text-gray-600 hover:bg-gray-200'
            }`}
          >
            Inventory ({notificationList.filter(n => n.type === 'inventory').length})
          </button>
          <button
            onClick={() => setFilter('customer')}
            className={`px-4 py-2 rounded-lg text-sm font-medium transition-colors ${
              filter === 'customer' 
                ? 'bg-blue-600 text-white' 
                : 'bg-gray-100 text-gray-600 hover:bg-gray-200'
            }`}
          >
            Customer ({notificationList.filter(n => n.type === 'customer').length})
          </button>
          <button
            onClick={() => setFilter('system')}
            className={`px-4 py-2 rounded-lg text-sm font-medium transition-colors ${
              filter === 'system' 
                ? 'bg-blue-600 text-white' 
                : 'bg-gray-100 text-gray-600 hover:bg-gray-200'
            }`}
          >
            System ({notificationList.filter(n => n.type === 'system').length})
          </button>
        </div>
      </div>

      {/* Notifications List */}
      <div className="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div className="divide-y divide-gray-200">
          {filteredNotifications.map((notification) => (
            <div
              key={notification.id}
              className={`p-6 border-l-4 ${getPriorityColor(notification.priority)} ${
                !notification.read ? 'bg-blue-50' : 'bg-white'
              } hover:bg-gray-50 transition-colors`}
            >
              <div className="flex items-start justify-between">
                <div className="flex items-start space-x-4">
                  <div className="flex-shrink-0">
                    {getNotificationIcon(notification.type)}
                  </div>
                  <div className="flex-1">
                    <div className="flex items-center space-x-2 mb-1">
                      <h3 className={`text-sm font-medium ${!notification.read ? 'text-gray-900' : 'text-gray-700'}`}>
                        {notification.title}
                      </h3>
                      {!notification.read && (
                        <div className="w-2 h-2 bg-blue-600 rounded-full"></div>
                      )}
                      {notification.actionRequired && (
                        <span className="px-2 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded-full">
                          Action Required
                        </span>
                      )}
                    </div>
                    <p className="text-sm text-gray-600 mb-2">{notification.message}</p>
                    <div className="flex items-center space-x-4">
                      <span className="text-xs text-gray-500">{notification.time}</span>
                      <span className={`text-xs px-2 py-1 rounded-full ${
                        notification.priority === 'high' ? 'bg-red-100 text-red-800' :
                        notification.priority === 'medium' ? 'bg-yellow-100 text-yellow-800' :
                        'bg-green-100 text-green-800'
                      }`}>
                        {notification.priority} priority
                      </span>
                    </div>
                  </div>
                </div>
                <div className="flex items-center space-x-2">
                  {!notification.read && (
                    <button
                      onClick={() => markAsRead(notification.id)}
                      className="p-1 text-gray-400 hover:text-green-600 transition-colors"
                      title="Mark as read"
                    >
                      <Check className="w-4 h-4" />
                    </button>
                  )}
                  <button
                    onClick={() => deleteNotification(notification.id)}
                    className="p-1 text-gray-400 hover:text-red-600 transition-colors"
                    title="Delete notification"
                  >
                    <X className="w-4 h-4" />
                  </button>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}