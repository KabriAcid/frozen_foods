import React, { useState } from 'react';
import { Search, Send, Paperclip, MoreHorizontal, Star, Archive, Trash2 } from 'lucide-react';

interface Message {
  id: string;
  customer: string;
  avatar: string;
  subject: string;
  preview: string;
  time: string;
  unread: boolean;
  starred: boolean;
  priority: 'high' | 'medium' | 'low';
}

interface Conversation {
  id: string;
  messages: {
    id: string;
    sender: 'customer' | 'admin';
    content: string;
    time: string;
  }[];
}

const messages: Message[] = [
  {
    id: 'MSG-001',
    customer: 'John Doe',
    avatar: 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=100',
    subject: 'Order Issue - Missing Items',
    preview: 'Hi, I received my order but it seems like some items are missing...',
    time: '2 min ago',
    unread: true,
    starred: false,
    priority: 'high'
  },
  {
    id: 'MSG-002',
    customer: 'Jane Smith',
    avatar: 'https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=100',
    subject: 'Great Service!',
    preview: 'Thank you for the amazing food and quick delivery. Everything was perfect!',
    time: '15 min ago',
    unread: true,
    starred: true,
    priority: 'low'
  },
  {
    id: 'MSG-003',
    customer: 'Mike Johnson',
    avatar: 'https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=100',
    subject: 'Delivery Address Change',
    preview: 'Can I change the delivery address for my current order? I need to...',
    time: '1 hour ago',
    unread: false,
    starred: false,
    priority: 'medium'
  },
  {
    id: 'MSG-004',
    customer: 'Sarah Wilson',
    avatar: 'https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=100',
    subject: 'Allergy Information',
    preview: 'I have a severe nut allergy. Can you confirm which dishes are nut-free?',
    time: '2 hours ago',
    unread: false,
    starred: true,
    priority: 'high'
  },
  {
    id: 'MSG-005',
    customer: 'David Brown',
    avatar: 'https://images.pexels.com/photos/1681010/pexels-photo-1681010.jpeg?auto=compress&cs=tinysrgb&w=100',
    subject: 'Catering Inquiry',
    preview: 'I would like to inquire about catering services for a corporate event...',
    time: '3 hours ago',
    unread: false,
    starred: false,
    priority: 'medium'
  }
];

const conversations: { [key: string]: Conversation } = {
  'MSG-001': {
    id: 'MSG-001',
    messages: [
      {
        id: '1',
        sender: 'customer',
        content: 'Hi, I received my order but it seems like some items are missing. I ordered the Greek Salad and Mediterranean Pasta, but only received the salad.',
        time: '2:30 PM'
      },
      {
        id: '2',
        sender: 'admin',
        content: 'Hi John, I sincerely apologize for this issue. Let me check your order details right away and resolve this for you.',
        time: '2:32 PM'
      },
      {
        id: '3',
        sender: 'customer',
        content: 'Thank you for the quick response. My order number is #ORD-001.',
        time: '2:33 PM'
      }
    ]
  }
};

function getPriorityColor(priority: Message['priority']) {
  switch (priority) {
    case 'high':
      return 'bg-red-100 text-red-800';
    case 'medium':
      return 'bg-yellow-100 text-yellow-800';
    case 'low':
      return 'bg-green-100 text-green-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
}

export function MessagesPage() {
  const [selectedMessage, setSelectedMessage] = useState<Message | null>(null);
  const [newMessage, setNewMessage] = useState('');

  const handleSendMessage = () => {
    if (newMessage.trim() && selectedMessage) {
      // Add message logic here
      setNewMessage('');
    }
  };

  return (
    <div className="h-[calc(100vh-8rem)] flex">
      {/* Messages List */}
      <div className="w-1/3 bg-white border-r border-gray-200 flex flex-col">
        {/* Header */}
        <div className="p-4 border-b border-gray-200">
          <h1 className="text-xl font-bold text-gray-900 mb-4">Messages</h1>
          <div className="relative">
            <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" />
            <input
              type="text"
              placeholder="Search messages..."
              className="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
            />
          </div>
        </div>

        {/* Message List */}
        <div className="flex-1 overflow-y-auto">
          {messages.map((message) => (
            <div
              key={message.id}
              onClick={() => setSelectedMessage(message)}
              className={`p-4 border-b border-gray-100 cursor-pointer hover:bg-gray-50 transition-colors ${
                selectedMessage?.id === message.id ? 'bg-blue-50 border-blue-200' : ''
              }`}
            >
              <div className="flex items-start space-x-3">
                <img
                  src={message.avatar}
                  alt={message.customer}
                  className="w-10 h-10 rounded-full object-cover"
                />
                <div className="flex-1 min-w-0">
                  <div className="flex items-center justify-between mb-1">
                    <h3 className={`text-sm font-medium truncate ${message.unread ? 'text-gray-900' : 'text-gray-600'}`}>
                      {message.customer}
                    </h3>
                    <div className="flex items-center space-x-1">
                      {message.starred && <Star className="w-3 h-3 text-yellow-400 fill-current" />}
                      <span className="text-xs text-gray-500">{message.time}</span>
                    </div>
                  </div>
                  <p className={`text-sm font-medium mb-1 truncate ${message.unread ? 'text-gray-900' : 'text-gray-600'}`}>
                    {message.subject}
                  </p>
                  <p className="text-xs text-gray-500 truncate">{message.preview}</p>
                  <div className="flex items-center justify-between mt-2">
                    <span className={`text-xs px-2 py-1 rounded-full ${getPriorityColor(message.priority)}`}>
                      {message.priority}
                    </span>
                    {message.unread && <div className="w-2 h-2 bg-blue-600 rounded-full"></div>}
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>

      {/* Conversation View */}
      <div className="flex-1 flex flex-col">
        {selectedMessage ? (
          <>
            {/* Conversation Header */}
            <div className="p-4 border-b border-gray-200 bg-white">
              <div className="flex items-center justify-between">
                <div className="flex items-center space-x-3">
                  <img
                    src={selectedMessage.avatar}
                    alt={selectedMessage.customer}
                    className="w-10 h-10 rounded-full object-cover"
                  />
                  <div>
                    <h2 className="text-lg font-medium text-gray-900">{selectedMessage.customer}</h2>
                    <p className="text-sm text-gray-500">{selectedMessage.subject}</p>
                  </div>
                </div>
                <div className="flex items-center space-x-2">
                  <button className="p-2 text-gray-400 hover:text-yellow-600 transition-colors">
                    <Star className="w-5 h-5" />
                  </button>
                  <button className="p-2 text-gray-400 hover:text-gray-600 transition-colors">
                    <Archive className="w-5 h-5" />
                  </button>
                  <button className="p-2 text-gray-400 hover:text-red-600 transition-colors">
                    <Trash2 className="w-5 h-5" />
                  </button>
                  <button className="p-2 text-gray-400 hover:text-gray-600 transition-colors">
                    <MoreHorizontal className="w-5 h-5" />
                  </button>
                </div>
              </div>
            </div>

            {/* Messages */}
            <div className="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50">
              {conversations[selectedMessage.id]?.messages.map((msg) => (
                <div
                  key={msg.id}
                  className={`flex ${msg.sender === 'admin' ? 'justify-end' : 'justify-start'}`}
                >
                  <div
                    className={`max-w-xs lg:max-w-md px-4 py-2 rounded-lg ${
                      msg.sender === 'admin'
                        ? 'bg-blue-600 text-white'
                        : 'bg-white text-gray-900 border border-gray-200'
                    }`}
                  >
                    <p className="text-sm">{msg.content}</p>
                    <p className={`text-xs mt-1 ${msg.sender === 'admin' ? 'text-blue-100' : 'text-gray-500'}`}>
                      {msg.time}
                    </p>
                  </div>
                </div>
              ))}
            </div>

            {/* Message Input */}
            <div className="p-4 border-t border-gray-200 bg-white">
              <div className="flex items-end space-x-2">
                <button className="p-2 text-gray-400 hover:text-gray-600 transition-colors">
                  <Paperclip className="w-5 h-5" />
                </button>
                <div className="flex-1">
                  <textarea
                    value={newMessage}
                    onChange={(e) => setNewMessage(e.target.value)}
                    placeholder="Type your message..."
                    className="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                    rows={3}
                  />
                </div>
                <button
                  onClick={handleSendMessage}
                  className="p-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                >
                  <Send className="w-5 h-5" />
                </button>
              </div>
            </div>
          </>
        ) : (
          <div className="flex-1 flex items-center justify-center bg-gray-50">
            <div className="text-center">
              <div className="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                <Search className="w-8 h-8 text-gray-400" />
              </div>
              <h3 className="text-lg font-medium text-gray-900 mb-2">No conversation selected</h3>
              <p className="text-gray-500">Choose a message from the list to start reading</p>
            </div>
          </div>
        )}
      </div>
    </div>
  );
}