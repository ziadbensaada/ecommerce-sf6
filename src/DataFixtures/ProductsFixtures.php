<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Products;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Tests\Models\Enums\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $faker=Factory::create();
        // for($i=1;$i<=10;$i++){
        //     $product=new Products();
        //     $product->setName($faker->text(15));
        //     $product->setDescription($faker->text());
        //     $product->setPrice($faker->numberBetween(1000,1000000));
        //     $product->setStock($faker->numberBetween(0,9));
        //     $product->setSlug($product->getName());
        //     $category=$this->getReference('cat-'.rand(1,10));
        //     $product->setCategories($category);
        //     $this->setReference('prod-'.$i,$product);
        //     $manager->persist($product);
        // }
        // $manager->flush();
        // Generate products for the "Hardware" category
        $i=1;
        //Hardware
        // Desktop computers
        $desktop = new Products();
        $desktop->setName("Desktop computers");
        $desktop->setDescription("Desktop computers are personal computers designed to be used on a desk or workstation. 
            They consist of separate components, including a computer case or tower, a monitor,
            a keyboard, and a mouse. Desktop computers are known for their power, expandability,
            and versatility, making them suitable for a wide range of tasks.");
        $desktop->setPrice(999.99); // Example price, adjust as needed
        $desktop->setStock(50); // Example stock value, adjust as needed
        $desktop->setSlug("desktop-computers");

        // Laptop computers
        $laptop = new Products();
        $laptop->setName("Laptop computers");
        $laptop->setDescription("Laptop computers, also known as notebooks, are portable computers designed for mobility. 
            They integrate the display, keyboard, touchpad, and other components into a single unit. Laptops offer the 
            convenience of computing on the go, making them popular for work, education, and entertainment.");
        $laptop->setPrice(1499.99); // Example price, adjust as needed
        $laptop->setStock(30); // Example stock value, adjust as needed
        $laptop->setSlug("laptop-computers");

        // Tablets
        $tablet = new Products();
        $tablet->setName("Tablets");
        $tablet->setDescription("Tablets are handheld devices that offer a larger screen size compared to smartphones 
            and provide touch-based interaction. They are commonly used for browsing the web, watching videos, 
            reading e-books, and running mobile applications. Tablets provide a portable and versatile computing 
            experience.");
        $tablet->setPrice(499.99); // Example price, adjust as needed
        $tablet->setStock(20); // Example stock value, adjust as needed
        $tablet->setSlug("tablets");

        // Set the category for all products
        $category = $this->getReference('cat-2');
        $desktop->setCategories($category);
        $laptop->setCategories($category);
        $tablet->setCategories($category);

        // Add the products to the reference and persist them
        $this->setReference('prod-' . $i, $desktop);
        $this->setReference('prod-' . ($i + 1), $laptop);
        $this->setReference('prod-' . ($i + 2), $tablet);

        $manager->persist($desktop);
        $manager->persist($laptop);
        $manager->persist($tablet);
        //Software
        // Operating systems
        $osLinux = new Products();
        $osLinux->setName("Linux");
        $osLinux->setDescription("Linux is an open-source operating system based on the Linux kernel. It provides a customizable and highly secure environment and is widely used in server environments and for development purposes.");
        $osLinux->setPrice(0); // Example price, adjust as needed
        $osLinux->setStock(20); // Example stock value, adjust as needed
        $osLinux->setSlug("linux");
        // Office suites
        $officeMicrosoft = new Products();
        $officeMicrosoft->setName("Microsoft Office");
        $officeMicrosoft->setDescription("Microsoft Office is a suite of productivity applications, including Word, Excel, PowerPoint, and more. It is widely used for creating, editing, and managing documents, spreadsheets, and presentations.");
        $officeMicrosoft->setPrice(149.99); // Example price, adjust as needed
        $officeMicrosoft->setStock(100); // Example stock value, adjust as needed
        $officeMicrosoft->setSlug("microsoft-office");
        // Security software
        $antivirus = new Products();
        $antivirus->setName("Antivirus");
        $antivirus->setDescription("Antivirus software is designed to detect, prevent, and remove malicious software, such as viruses, malware, and spyware. It helps protect computers and data from security threats.");
        $antivirus->setPrice(49.99); // Example price, adjust as needed
        $antivirus->setStock(200); // Example stock value, adjust as needed
        $antivirus->setSlug("antivirus");
        // Set the category for all products
        $category = $this->getReference('cat-3');
        $osLinux->setCategories($category);
        $officeMicrosoft->setCategories($category);
        $antivirus->setCategories($category);

        // Add the products to the reference and persist them
        $this->setReference('prod-' . ($i + 3), $osLinux);
        $this->setReference('prod-' . ($i + 4), $officeMicrosoft);
        $this->setReference('prod-' . ($i + 5), $antivirus);
        $manager->persist($osLinux);
        $manager->persist($officeMicrosoft);
        $manager->persist($antivirus);
        //Networks and Telecommunications:
        // Generate products for the "Networks and Telecommunications" category
        // Routers
        $router = new Products();
        $router->setName("Router");
        $router->setDescription("A router is a networking device that forwards data packets between computer networks. It acts as a central hub for connecting multiple devices and directing network traffic.");
        $router->setPrice(99.99); // Example price, adjust as needed
        $router->setStock(50); // Example stock value, adjust as needed
        $router->setSlug("router");

        // Network switches
        $switch = new Products();
        $switch->setName("Network Switch");
        $switch->setDescription("A network switch is a device that connects multiple devices within a computer network. It allows devices to communicate with each other by forwarding data packets to the appropriate destination.");
        $switch->setPrice(49.99); // Example price, adjust as needed
        $switch->setStock(30); // Example stock value, adjust as needed
        $switch->setSlug("network-switch");

        // Modems
        $modem = new Products();
        $modem->setName("Modem");
        $modem->setDescription("A modem is a device that enables communication between a computer or network and an internet service provider (ISP). It converts digital signals into analog signals for transmission over telephone lines or cable connections.");
        $modem->setPrice(79.99); // Example price, adjust as needed
        $modem->setStock(20); // Example stock value, adjust as needed
        $modem->setSlug("modem");

        // Set the category for all products
        $category = $this->getReference('cat-4');
        $router->setCategories($category);
        $switch->setCategories($category);
        $modem->setCategories($category);

        // Add the products to the reference and persist them
        $this->setReference('prod-' . ($i + 6), $router);
        $this->setReference('prod-' . ($i + 7), $switch);
        $this->setReference('prod-' . ($i + 8), $modem);

        $manager->persist($router);
        $manager->persist($switch);
        $manager->persist($modem);
        //CyberSecurity
        // Firewalls
        $firewall = new Products();
        $firewall->setName("Firewall");
        $firewall->setDescription("A firewall is a network security device that monitors and controls incoming and outgoing network traffic. It acts as a barrier between internal and external networks, helping to prevent unauthorized access and protect against cyber threats.");
        $firewall->setPrice(199.99); // Example price, adjust as needed
        $firewall->setStock(50); // Example stock value, adjust as needed
        $firewall->setSlug("firewall");

        // Intrusion detection systems (IDS)
        $ids = new Products();
        $ids->setName("Intrusion Detection System (IDS)");
        $ids->setDescription("An Intrusion Detection System (IDS) is a security technology that monitors network traffic for malicious activities or policy violations. It detects and alerts administrators about potential threats, providing early warning and analysis of security incidents.");
        $ids->setPrice(149.99); // Example price, adjust as needed
        $ids->setStock(30); // Example stock value, adjust as needed
        $ids->setSlug("intrusion-detection-system");

        // Intrusion prevention systems (IPS)
        $ips = new Products();
        $ips->setName("Intrusion Prevention System (IPS)");
        $ips->setDescription("An Intrusion Prevention System (IPS) is a security technology that not only detects but also actively prevents potential threats. It inspects network traffic, identifies and blocks malicious activities in real-time, and provides an additional layer of defense against cyber attacks.");
        $ips->setPrice(249.99); // Example price, adjust as needed
        $ips->setStock(20); // Example stock value, adjust as needed
        $ips->setSlug("intrusion-prevention-system");

        // Set the category for all products
        $category = $this->getReference('cat-5');
        $firewall->setCategories($category);
        $ids->setCategories($category);
        $ips->setCategories($category);

        // Add the products to the reference and persist them
        $this->setReference('prod-' . ($i + 9), $firewall);
        $this->setReference('prod-' . ($i + 10), $ids);
        $this->setReference('prod-' . ($i + 11), $ips);

        $manager->persist($firewall);
        $manager->persist($ids);
        $manager->persist($ips);
        //Web Developpment
        // Programming languages
        $php = new Products();
        $php->setName("PHP");
        $php->setDescription("PHP is a server-side scripting language designed for web development. It is used to create dynamic web pages, handle form data, interact with databases, and perform various server-side tasks.");
        $php->setPrice(0.00); // Example price, adjust as needed
        $php->setStock(100); // Example stock value, adjust as needed
        $php->setSlug("php");
        // Frameworks
        $symfony = new Products();
        $symfony->setName("Symfony");
        $symfony->setDescription("Symfony is a PHP library for backend. It provides a component-based approach to UI development, enabling developers to create reusable UI elements and efficiently manage state changes.");
        $symfony->setPrice(0.00); // Example price, adjust as needed
        $symfony->setStock(50); // Example stock value, adjust as needed
        $symfony->setSlug("symfony");
        // Databases
        $mysql = new Products();
        $mysql->setName("MySQL");
        $mysql->setDescription("MySQL is an open-source relational database management system (RDBMS) widely used for web applications. It provides a scalable and efficient way to store and retrieve structured data for various web development projects.");
        $mysql->setPrice(0.00); // Example price, adjust as needed
        $mysql->setStock(50); // Example stock value, adjust as needed
        $mysql->setSlug("mysql");
        // Set the category for all products
        $category = $this->getReference('cat-6');
        $php->setCategories($category);
        $symfony->setCategories($category);
        $mysql->setCategories($category);
        // Add the products to the reference and persist them
        $this->setReference('prod-' . ($i + 12), $php);
        $this->setReference('prod-' . ($i + 13), $symfony);
        $this->setReference('prod-' . ($i + 14), $mysql);

        $manager->persist($php);
        $manager->persist($symfony);
        $manager->persist($mysql);
        //Artificial Intelligence and Machine Learning
        // Libraries and frameworks
        $tensorflow = new Products();
        $tensorflow->setName("TensorFlow");
        $tensorflow->setDescription("TensorFlow is an open-source machine learning framework developed by Google. It provides a comprehensive set of tools and libraries for building and deploying machine learning models, including deep learning algorithms, neural networks, and dataflow graphs.");
        $tensorflow->setPrice(0.00); // Example price, adjust as needed
        $tensorflow->setStock(100); // Example stock value, adjust as needed
        $tensorflow->setSlug("tensorflow");

        // Data visualization tools
        $matplotlib = new Products();
        $matplotlib->setName("Matplotlib");
        $matplotlib->setDescription("Matplotlib is a plotting library for creating visualizations in Python. It provides a wide range of customizable plots, charts, and graphs, making it a popular choice for data visualization tasks in the field of machine learning and data science.");
        $matplotlib->setPrice(0.00); // Example price, adjust as needed
        $matplotlib->setStock(50); // Example stock value, adjust as needed
        $matplotlib->setSlug("matplotlib");

        // AI development platforms
        $googleCloudAI = new Products();
        $googleCloudAI->setName("Google Cloud AI");
        $googleCloudAI->setDescription("Google Cloud AI is a comprehensive set of AI tools and services provided by Google Cloud Platform. It offers a wide range of features for developing and deploying AI applications, including pre-trained models, data storage, training infrastructure, and deployment options.");
        $googleCloudAI->setPrice(0.00); // Example price, adjust as needed
        $googleCloudAI->setStock(50); // Example stock value, adjust as needed
        $googleCloudAI->setSlug("google-cloud-ai");

        // Set the category for all products
        $category = $this->getReference('cat-7');
        $tensorflow->setCategories($category);
        $matplotlib->setCategories($category);
        $googleCloudAI->setCategories($category);

        // Add the products to the reference and persist them
        $this->setReference('prod-' . ($i + 15), $tensorflow);
        $this->setReference('prod-' . ($i + 16), $matplotlib);
        $this->setReference('prod-' . ($i + 17), $googleCloudAI);

        $manager->persist($tensorflow);
        $manager->persist($matplotlib);
        $manager->persist($googleCloudAI);
        $manager->flush();
    }
}
