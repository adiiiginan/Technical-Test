export class Book {
    private readonly _code: string;
    private readonly _title: string;
    private readonly _author: string;
    private _stock: number;
    private _isBorrowed: boolean;
  
    constructor(code: string, title: string, author: string, stock: number) {
      this._code = code;
      this._title = title;
      this._author = author;
      this._stock = stock;
      this._isBorrowed = false;
    }
  
    get code(): string {
      return this._code;
    }
  
    get title(): string {
      return this._title;
    }
  
    get author(): string {
      return this._author;
    }
  
    get stock(): number {
      return this._stock;
    }
  
    borrow(): void {
      if (this._stock === 0) {
        throw new Error('Stock unavailable');
      }
      this._stock--;
      this._isBorrowed = true;
    }
  
    return(): void {
      this._stock++;
      this._isBorrowed = false;
    }
  }
  