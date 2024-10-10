import { Book } from '../../domain/entities/book.entity';
import { BookRepository } from '../../domain/repositories/book.repository';

const books: Book[] = [
  new Book('JK-45', 'Harry Potter', 'J.K Rowling', 1),
  new Book('SHR-1', 'A Study in Scarlet', 'Arthur Conan Doyle', 1),
  new Book('TW-11', 'Twilight', 'Stephenie Meyer', 1),
  new Book('HOB-83', 'The Hobbit', 'J.R.R. Tolkien', 1),
  new Book('NRN-7', 'The Lion, the Witch and the Wardrobe', 'C.S. Lewis', 1),
];

export class MockBookRepository implements BookRepository {
  async findByCode(code: string): Promise<Book | undefined> {
    return books.find(book => book.code === code);
  }

  async save(book: Book): Promise<void> {
    const index = books.findIndex(b => b.code === book.code);
    if (index > -1) {
      books[index] = book;
    }
  }
}
