# php-WebHDFS

## Description

php-WebHDFS is a PHP client for [WebHDFS](http://hadoop.apache.org/docs/r2.0.3-alpha/hadoop-project-dist/hadoop-hdfs/WebHDFS.html).


## Dependencies
* [PHP](http://php.net/)
* [cURL](http://curl.haxx.se/)


## Usage

* [File and Directory Operations](#file-and-directory-operations)
  * [Create and Write to a File](#create-and-write-to-a-file)
  * [Append to a File](#append-to-a-file)
  * [Concat File(s)](#concat-files)
  * [Open and Read a File](#open-and-read-a-file)
  * [Make a Directory](#make-a-directory)
  * [Create a Symbolic Link](#create-a-symbolic-link)
  * [Rename a File/Directory](#rename-a-filedirectory)
  * [Delete a File/Directory](#delete-a-filedirectory)
  * [Status of a File/Directory](#status-of-a-filedirectory)
  * [List a Directory](#list-a-directory)
* [Other File System Operations](#other-file-system-operations)
  * [Get Content Summary of a Directory](#get-content-summary-of-a-directory)
  * [Get File Checksum](#get-file-checksum)
  * [Get Home Directory](#get-home-directory)
  * [Set Permission](#set-permission)
  * [Set Owner](#set-owner)
  * [Set Replication Factor](#set-replication-factor)
  * [Set Access or Modification Time](#set-access-or-modification-time)

### File and Directory Operations

#### Create and Write to a File
```php
hdfs = new WebHDFS('mynamenode.hadoop.com', '50070', 'hadoop-username');
$hdfs->create('user/hadoop-username/new-file.txt', 'local-file.txt');
```

#### Append to a File
```php
$hdfs = new WebHDFS('mynamenode.hadoop.com', '50070', 'hadoop-username');
$hdfs->append('user/hadoop-username/file-to-append-to.txt', 'local-file.txt');
```

#### Concat File(s)
Not yet implemented.

#### Open and Read a File
```php
$hdfs = new WebHDFS('mynamenode.hadoop.com', '50070', 'hadoop-username');
$response = $hdfs->open('user/hadoop-username/file.txt');
```

#### Make a Directory
```php
$hdfs = new WebHDFS('mynamenode.hadoop.com', '50070', 'hadoop-username');
$hdfs->mkdirs('user/hadoop-username/new/directory/structure');
```

#### Create a Symbolic Link
Not yet implemented.

#### Rename a File/Directory
Not yet implemented.

#### Delete a File/Directory
Not yet implemented.

#### Status of a File/Directory
```php
$hdfs = new WebHDFS('mynamenode.hadoop.com', '50070', 'hadoop-username');
$response = $hdfs->getFileStatus('user/hadoop-username/file.txt');
```

#### List a Directory
```php
$hdfs = new WebHDFS('mynamenode.hadoop.com', '50070', 'hadoop-username');
$response = $hdfs->listStatus('user/hadoop-username/');
```

### Other File System Operations

#### Get Content Summary of a Directory
```php
$hdfs = new WebHDFS('mynamenode.hadoop.com', '50070', 'hadoop-username');
$response = $hdfs->getContentSummary('user/hadoop-username/');
```

#### Get File Checksum
```php
$hdfs = new WebHDFS('mynamenode.hadoop.com', '50070', 'hadoop-username');
$response = $hdfs->getFileChecksum('user/hadoop-username/file.txt');
```

#### Get Home Directory
```php
$hdfs = new WebHDFS('mynamenode.hadoop.com', '50070', 'hadoop-username');
$response = $hdfs->getHomeDirectory();
```

#### Set Permission
Not yet implemented.

#### Set Owner
Not yet implemented.

#### Set Replication Factor
Not yet implemented.

#### Set Access or Modification Time
Not yet implemented.