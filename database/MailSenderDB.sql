DROP DATABASE mailsender;
CREATE DATABASE mailsender;
USE mailsender;

CREATE TABLE mailsender.tb_registerUsers ( 
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    register_date TIMESTAMP,
    email VARCHAR(100) NULL ,
    password VARCHAR(100) NULL,
    type VARCHAR(6) NULL
);

CREATE TABLE mailsender.tb_mails2sent ( 
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    email VARCHAR(100) NULL ,
    register_date TIMESTAMP ,
    register_for VARCHAR(100)
);

CREATE TABLE mailsender.tb_historySentMails ( 
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    sent_date TIMESTAMP ,
    sent_for VARCHAR(100),
    subject VARCHAR(300),
    message LONGTEXT,
    mails2sent LONGTEXT
);

INSERT INTO tb_registerUsers (`email`, `password`, `type`) VALUES 
                             ('elainelagoperes@gmail.com', 'integral102030', 'admin'), 
                             ('filipelperes@gmail.com', 'integral102030', 'admin'),
                             ('elisa_lago_peres@hotmail.com', 'integral102030', 'admin'),
                             ('integralefuncional@gmail.com', 'integral102030', 'admin');

INSERT INTO tb_mails2sent (`email`, `register_for`) VALUES 
                          ('elainelperes@gmail.com', 'elainelagoperes@gmail.com'),
                          ('filipelperes@gmail.com', 'elainelagoperes@gmail.com'),
                          ('elisa_lago_peres@hotmail.com', 'elainelagoperes@gmail.com');