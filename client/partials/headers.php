<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frozen Foods - Dashboard</title>
    <link rel="shortcut icon" href="/frozen_foods/assets/img/favicon.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Icons stylesheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Toasted library -->
    <link rel="stylesheet" href="../assets/css/toasted.css">
    <!-- Custom stylesheets -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: 'DM Sans';
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        accent: '#F97316',
                        gray: '#f6f7fc',
                        dark: '#201f20',
                        secondary: '#ff7272'
                    },
                    fontFamily: {
                        'dm': ['DM Sans', 'sans-serif']
                    },
                    animation: {
                        'bounce-gentle': 'bounce-gentle 0.6s ease-in-out',
                        'scale-in': 'scale-in 0.2s ease-out',
                        'slide-up': 'slide-up 0.3s ease-out',
                        'fade-in': 'fade-in 0.4s ease-out',
                        'slide-down': 'slide-down 0.3s ease-out'
                    },
                    keyframes: {
                        'bounce-gentle': {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-4px)'
                            }
                        },
                        'scale-in': {
                            '0%': {
                                transform: 'scale(0.95)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'scale(1)',
                                opacity: '1'
                            }
                        },
                        'slide-up': {
                            '0%': {
                                transform: 'translateY(20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        'slide-down': {
                            '0%': {
                                transform: 'translateY(-20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        'fade-in': {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            }
                        }
                    }
                }
            }
        }
    </script>
</head>